$(document).ready(function() {
	// add module input field
	function addModuleInput() {
		var numInputs = $('.module-input').length;

		var newInput = '<div class="module-input">' +
			'<label for="module-name-' + (numInputs+1) + '">Module Name:</label>' +
			'<input type="text" name="module-name[]" id="module-name-' + (numInputs+1) + '" required>' +
			'<label for="module-grade-' + (numInputs+1) + '">Overall Grade (%):</label>' +
			'<input type="number" name="module-grade[]" id="module-grade-' +
			(numInputs+1) + '" min="0" max="100" required>' +
			'<label for="module-credit-' + (numInputs+1) + '">Credit:</label>' +
			'<input type="number" name="module-credit[]" id="module-credit-' +
			(numInputs+1) + '" min="0" required>' +
			'<button type="button" class="remove-module-btn" onclick="removeModuleInput(this)">Remove</button>' +
			'</div>';

		$('#module-inputs').append(newInput);
	}

	// remove module input field
	function removeModuleInput(btn) {
		$(btn).closest('.module-input').remove();
	}

	// calculate weighted grade
	function calculateWeightedGrade() {
		var totalCredits = 0;
		var totalGradePoints = 0;

		$('.module-input').each(function() {
			var grade = parseInt($(this).find('input[name="module-grade[]"]').val());
			var credits = parseInt($(this).find('input[name="module-credit[]"]').val());

			if (!isNaN(grade) && !isNaN(credits)) {
				totalGradePoints += grade * credits;
				totalCredits += credits;
			}
		});

		if (totalCredits > 0) {
			var weightedGrade = (totalGradePoints / totalCredits).toFixed(2);
			$('#weighted-grade').text(weightedGrade);
			setDegreeClassification(weightedGrade);
		} else {
			$('#weighted-grade').text('');
			$('#degree-classification').text('');
		}
	}

	// set degree classification
	function setDegreeClassification(weightedGrade) {
		var classification = '';

		if (weightedGrade >= 70) {
			classification = 'First Class Honours';
		} else if (weightedGrade >= 60) {
			classification = 'Upper Second Class Honours';
		} else if (weightedGrade >= 50) {
			classification = 'Lower Second Class Honours';
		} else if (weightedGrade >= 40) {
			classification = 'Third Class Honours';
		} else {
			classification = 'Fail';
		}

		$('#degree-classification').text(classification);
	}

	// add module input field when "Add Another Module" button is clicked
	$('#add-module-btn').on('click', function() {
		addModuleInput();
	});

	// remove module input field when "Remove" button is clicked
	$(document).on('click', '.remove-module-btn', function() {
		removeModuleInput(this);
		});
		// calculate weighted grade and set degree classification when form is submitted
$('#grade-form').on('submit', function(e) {
	e.preventDefault();
	calculateWeightedGrade();
});

// calculate weighted grade and set degree classification when input fields are changed
$(document).on('change', '#grade-form input', function() {
	calculateWeightedGrade();
});

// calculate weighted grade and set degree classification when form is submitted
$('#grade-form').on('submit', function(e) {
    e.preventDefault();
    calculateWeightedGrade();
    $('#result').show(); // show the result section
});

});