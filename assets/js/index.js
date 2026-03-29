document.addEventListener('DOMContentLoaded', () => {
	const form = document.getElementById('cv-form');
	const skillsWrapper = document.getElementById('skills-wrapper');
	const languagesWrapper = document.getElementById('languages-wrapper');
	const addSkillBtn = document.getElementById('add-skill');
	const addLanguageBtn = document.getElementById('add-language');

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

	function createField(wrapper, name, placeholder) {
		const fieldRow = document.createElement('div');

		const input = document.createElement('input');
		input.type = 'text';
		input.name = name;
		input.placeholder = placeholder;

		const removeBtn = document.createElement('button');
		removeBtn.type = 'button';
		removeBtn.textContent = 'Remove';

		removeBtn.addEventListener('click', () => {
			if (wrapper.children.length > 1) {
				fieldRow.remove();
			} else {
				input.value = '';
			}
		});

		fieldRow.appendChild(input);
		fieldRow.appendChild(removeBtn);
		wrapper.appendChild(fieldRow);
	}

	if (addSkillBtn && skillsWrapper) {
		addSkillBtn.addEventListener('click', () => {
			createField(skillsWrapper, 'skills[]', 'e.g. CSS');
		});
	}

	if (addLanguageBtn && languagesWrapper) {
		addLanguageBtn.addEventListener('click', () => {
			createField(languagesWrapper, 'languages[]', 'e.g. Filipino');
		});
	}

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
