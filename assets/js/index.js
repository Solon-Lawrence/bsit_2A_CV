document.addEventListener('DOMContentLoaded', () => {
	const form = document.getElementById('cv-form');
	const skillsWrapper = document.getElementById('skills-wrapper');
	const languagesWrapper = document.getElementById('languages-wrapper');
	const experienceWrapper = document.getElementById('experience-wrapper');
	const educationWrapper = document.getElementById('education-wrapper');
	const addSkillBtn = document.getElementById('add-skill');
	const addLanguageBtn = document.getElementById('add-language');
	const addExperienceBtn = document.getElementById('add-experience');
	const addEducationBtn = document.getElementById('add-education');

	function moveToNextField(currentElement) {
		if (!form) return;

		const focusable = Array.from(
			form.querySelectorAll('input, textarea, select, button')
		).filter((el) => {
			if (el.disabled) return false;
			if (el.type === 'hidden') return false;
			if (el.type === 'submit') return false;
			return true;
		});

		const currentIndex = focusable.indexOf(currentElement);
		if (currentIndex > -1 && currentIndex < focusable.length - 1) {
			focusable[currentIndex + 1].focus();
		}
	}

	function createSimpleField(wrapper, name, placeholder) {
		const fieldRow = document.createElement('div');
		fieldRow.className = 'dynamic-row simple-row';

		fieldRow.innerHTML = `
			<input type="text" name="${name}" placeholder="${placeholder}">
			<button type="button" class="remove-entry">Remove</button>
		`;

		wrapper.appendChild(fieldRow);
	}

	if (addSkillBtn && skillsWrapper) {
		addSkillBtn.addEventListener('click', () => {
			createSimpleField(skillsWrapper, 'skills[]', 'e.g. CSS');
		});
	}

	if (addLanguageBtn && languagesWrapper) {
		addLanguageBtn.addEventListener('click', () => {
			createSimpleField(languagesWrapper, 'languages[]', 'e.g. Filipino');
		});
	}

	if (addExperienceBtn && experienceWrapper) {
		addExperienceBtn.addEventListener('click', () => {
			const row = document.createElement('div');
			row.className = 'dynamic-row experience-item';
			row.innerHTML = `
				<label>Job Title:</label>
				<input type="text" name="work_title[]" placeholder="e.g. Software Engineer">

				<label>Period:</label>
				<input type="text" name="work_period[]" placeholder="e.g. Jan 2022 - Dec 2024">

				<label>Company / Location:</label>
				<input type="text" name="work_company[]" placeholder="e.g. ABC Company - Manila">

				<label>Description (one point per line):</label>
				<textarea name="work_description[]" rows="4" placeholder="- Built reusable UI components"></textarea>

				<button type="button" class="remove-entry">Remove Experience</button>
			`;

			experienceWrapper.appendChild(row);
		});
	}

	if (addEducationBtn && educationWrapper) {
		addEducationBtn.addEventListener('click', () => {
			const row = document.createElement('div');
			row.className = 'dynamic-row education-item';
			row.innerHTML = `
				<label>Degree / Program:</label>
				<input type="text" name="education_degree[]" placeholder="e.g. Bachelor of Science in IT">

				<label>Period:</label>
				<input type="text" name="education_period[]" placeholder="e.g. 2021 - 2025">

				<label>School / Location:</label>
				<input type="text" name="education_school[]" placeholder="e.g. XYZ University - Manila">

				<button type="button" class="remove-entry">Remove Education</button>
			`;

			educationWrapper.appendChild(row);
		});
	}

	document.addEventListener('click', (event) => {
		const target = event.target;
		if (!(target instanceof HTMLElement)) return;
		if (!target.classList.contains('remove-entry')) return;

		const row = target.closest('.dynamic-row');
		if (!row) return;

		const wrapper = row.parentElement;
		if (!wrapper) return;

		if (wrapper.children.length > 1) {
			row.remove();
			return;
		}

		const controls = row.querySelectorAll('input, textarea');
		controls.forEach((control) => {
			control.value = '';
		});
	});

	if (form) {
		form.addEventListener('keydown', (event) => {
			if (event.key !== 'Enter') return;

			const target = event.target;
			if (!(target instanceof HTMLElement)) return;

			if (target.tagName.toLowerCase() === 'textarea') {
				return;
			}

			if (target.tagName.toLowerCase() === 'input') {
				event.preventDefault();
				moveToNextField(target);
			}
		});
	}
});
