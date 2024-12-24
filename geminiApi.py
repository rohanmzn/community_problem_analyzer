import json
import requests

# Google Gemini API Configuration
API_KEY = "AIzaSyDLnLDtWEeF_d7XxocihI0schvazTPm358"
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
    "mental_health_stigma"
    "unknown_not_listed"
]

# Function to classify the prompt
def classify_with_gemini(prompt):
    try:
        # Request headers
        headers = {
            "Content-Type": "application/json"
        }

        # Prompt for the Gemini API
        instructions = (
            f"Classify the following prompt into one of these categories(give same casing and underscore dont change it. I wanna use it as primary key in database): {', '.join(CATEGORIES)}. "
            "Provide the category name followed by the solution, separated by a colon (e.g., 'Domestic Violence: Seek help ...').\n"
        )
        prompt = instructions + prompt

        # Request payload
        payload = {
            "contents": [{
                "parts": [{"text": prompt}]
            }]
        }

        # Make the POST request
        response = requests.post(f"{API_URL}?key={API_KEY}", headers=headers, json=payload)
        response.raise_for_status()

        # Debugging: Print raw API response
        print("API Response:", response.text)

        # Parse the JSON response
        result = response.json()
        text_response = result.get("candidates", [{}])[0].get("content", {}).get("parts", [{}])[0].get("text", "")

        # Split the response into category and solution
        if ":" in text_response:
            category, solution = map(str.strip, text_response.split(":", 1))
        else:
            category = "unknown"
            solution = "Solution not provided."

        return category, solution

    except requests.exceptions.RequestException as e:
        print(f"Error calling API: {e}")
        return "unknown", "Unable to fetch solution at this time."

# Function to save output to a JavaScript file
def save_to_js_file(data, filename="prompt.js"):
    try:
        with open(filename, "w") as file:
            file.write(f"const promptData = {json.dumps(data, indent=4)};\n")
        print(f"Output saved to {filename}")
    except IOError as e:
        print(f"Error saving to file: {e}")

# Main function
def main():
    prompt = input("Describe your problem: ")
    
    # Use the Gemini API to classify the prompt and get a solution
    category, solution = classify_with_gemini(prompt)
    
    # Prepare the output data
    output = {
        "prompt": prompt,
        "category": category,
        "solution": solution
    }
    
    # Print output to terminal
    print(json.dumps(output, indent=4))
    
    # Save output to file
    save_to_js_file(output)

if __name__ == "__main__":
    main()
