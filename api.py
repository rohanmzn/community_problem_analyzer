import json
import requests
import sys

# Google Gemini API Configuration
API_KEY = "AIzaSyAxkWaqlFQ-w3B2fy900hq48NO2SFpii6k"  # Replace with your actual API key
API_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent"

# Predefined categories
CATEGORIES = [
    "domestic_violence",
    "animal_abuse",
    "child_abuse",
    "sexual_harassment",
    "physical_verbal_abuse",
    "digital_abuse",
    "addiction",
    "mental_health_stigma",
    "unknown_not_listed"
]

# Function to classify the prompt
def classify_with_gemini(prompt):
    try:
        headers = {
            "Content-Type": "application/json"
        }
        instructions = (
            f"Classify the following prompt into one of these categories(give same casing and underscore dont change it. I wanna use it as primary key in database): {', '.join(CATEGORIES)}. "
            "Provide the category name followed by the solution, separated by a colon in the context of n Nepal(e.g., 'Domestic Violence: Seek help ...').\n"
        )
        prompt = instructions + prompt

        payload = {
            "contents": [{"parts": [{"text": prompt}]}]
        }

        response = requests.post(f"{API_URL}?key={API_KEY}", headers=headers, json=payload)
        response.raise_for_status()

        result = response.json()
        text_response = result.get("candidates", [{}])[0].get("content", {}).get("parts", [{}])[0].get("text", "")

        if ":" in text_response:
            category, solution = map(str.strip, text_response.split(":", 1))
        else:
            category = "unknown"
            solution = "Solution not provided."

        return category, solution

    except requests.exceptions.RequestException as e:
        print(f"Error calling API: {e}")
        return "unknown", "Unable to fetch solution at this time."

# Main function
def main():
    if len(sys.argv) > 1:
        prompt = sys.argv[1]
    else:
        print("Error: No prompt provided.")
        sys.exit(1)

    category, solution = classify_with_gemini(prompt)
    
    output = {
        "prompt": prompt,
        "category": category,
        "solution": solution
    }
    
    print(json.dumps(output, indent=4))

if __name__ == "__main__":
    main()
