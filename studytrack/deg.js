  // Function to calculate the overall weighted grade
  function calculateWeightedGrade() {
    let yearInputs = document.querySelectorAll(".year-input");
    let totalWeighting = 0;
    let weightedGradeSum = 0;

    // Loop through each year input and calculate the weighted grade
    yearInputs.forEach((yearInput) => {
        let yearGrade = parseFloat(yearInput.querySelector(".year-grade").value);
        let yearWeighting = parseFloat(yearInput.querySelector(".year-weighting").value);

        totalWeighting += yearWeighting;
        weightedGradeSum += (yearGrade * yearWeighting) / 100;
    });

    // Calculate the overall weighted grade
    let overallWeightedGrade = (weightedGradeSum / totalWeighting) * 100;

    // Update the UI with the overall weighted grade
    let weightedGradeElement = document.getElementById("weighted-grade");
    weightedGradeElement.innerText = overallWeightedGrade.toFixed(2) + "%";

    // Calculate and update the degree classification
    let degreeClassificationElement = document.getElementById("degree-classification");
    if (overallWeightedGrade >= 70) {
    degreeClassificationElement.innerText = "First Class Honours";
} else if (overallWeightedGrade >= 60) {
    degreeClassificationElement.innerText = "Upper Second Class Honours";
} else if (overallWeightedGrade >= 50) {
    degreeClassificationElement.innerText = "Lower Second Class Honours";
} else if (overallWeightedGrade >= 40) {
    degreeClassificationElement.innerText = "Third Class Honours";
} else {
    degreeClassificationElement.innerText = "Fail";
}
}

// Function to add another year input to the form
function addYearInput() {
let yearInputs = document.querySelectorAll(".year-input");
let yearCount = yearInputs.length;

// Create a new year input element
let newYearInput = document.createElement("div");
newYearInput.classList.add("year-input", "w3-row-padding");

// Create the year name input
let yearNameInput = document.createElement("div");
yearNameInput.classList.add("w3-col", "s12", "m4");
let yearNameLabel = document.createElement("label");
yearNameLabel.setAttribute("for", "year-name-" + (yearCount + 1));
yearNameLabel.innerText = "Year Name:";
let yearNameInputField = document.createElement("input");
yearNameInputField.setAttribute("type", "text");
yearNameInputField.setAttribute("name", "year-name[]");
yearNameInputField.setAttribute("id", "year-name-" + (yearCount + 1));
yearNameInputField.classList.add("w3-input");
yearNameInputField.setAttribute("required", "");
yearNameInput.appendChild(yearNameLabel);
yearNameInput.appendChild(yearNameInputField);
newYearInput.appendChild(yearNameInput);

// Create the year grade input
let yearGradeInput = document.createElement("div");
yearGradeInput.classList.add("w3-col", "s12", "m4");
let yearGradeLabel = document.createElement("label");
yearGradeLabel.setAttribute("for", "year-grade-" + (yearCount + 1));
yearGradeLabel.innerText = "Year Grade (%):";
let yearGradeInputField = document.createElement("input");
yearGradeInputField.setAttribute("type", "number");
yearGradeInputField.setAttribute("name", "year-grade[]");
yearGradeInputField.setAttribute("id", "year-grade-" + (yearCount + 1));
yearGradeInputField.setAttribute("min", "0");
yearGradeInputField.setAttribute("max", "100");
yearGradeInputField.classList.add("w3-input", "year-grade");
yearGradeInputField.setAttribute("required", "");
yearGradeInput.appendChild(yearGradeLabel);
yearGradeInput.appendChild(yearGradeInputField);
newYearInput.appendChild(yearGradeInput);

// Create the year weighting input
let yearWeightingInput = document.createElement("div");
yearWeightingInput.classList.add("w3-col", "s12", "m4");
let yearWeightingLabel = document.createElement("label");
yearWeightingLabel.setAttribute("for", "year-weighting-" + (yearCount + 1));
yearWeightingLabel.innerText = "Year Weighting (%):";
let yearWeightingInputField = document.createElement("input");
yearWeightingInputField.setAttribute("type", "number");
yearWeightingInputField.setAttribute("name", "year-weighting[]");
yearWeightingInputField.setAttribute("id", "year-weighting-" + (yearCount + 1));
yearWeightingInputField.setAttribute("min", "0");
yearWeightingInputField.setAttribute("max", "100");
yearWeightingInputField.classList.add("w3-input", "year-weighting");
yearWeightingInputField.setAttribute("required", "");
yearWeightingInput.appendChild(yearWeightingLabel);
yearWeightingInput.appendChild(yearWeightingInputField);
newYearInput.appendChild(yearWeightingInput);

// Add the new year input to the year inputs container
let yearInputsContainer = document.getElementById("year-inputs");
yearInputsContainer.appendChild(newYearInput);


}

// Add event listeners to the form
let gradeForm = document.getElementById("grade-form");
gradeForm.addEventListener("submit", function (event) {
event.preventDefault();
calculateWeightedGrade();
});

// Call the calculateWeightedGrade function initially
calculateWeightedGrade();