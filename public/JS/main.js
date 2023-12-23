// Selectors
const standardTheme = document.querySelector('.standard-theme');
const lightTheme = document.querySelector('.light-theme');
const darkerTheme = document.querySelector('.darker-theme');
const textElement = document.querySelector('.text-element');

// Event Listeners
standardTheme.addEventListener('click', () => changeTheme('standard'));
lightTheme.addEventListener('click', () => changeTheme('light'));
darkerTheme.addEventListener('click', () => changeTheme('darker'));

// Check if one theme has been set previously and apply it (or std theme if not found):
let savedTheme = localStorage.getItem('savedTheme');
savedTheme === null ?
    changeTheme('standard')
    : changeTheme(localStorage.getItem('savedTheme'));

// Simulate typing and deleting text
let textToType = "This is some text to be displayed and then deleted.";
let index = 0;
let isDeleting = false;
let speed = 100; // typing speed in milliseconds

function typeText() {
    const currentText = textElement.innerHTML;
    if (isDeleting) {
        textElement.innerHTML = currentText.substring(0, currentText.length - 1);
    } else {
        textElement.innerHTML = textToType.substring(0, index + 1);
        index++;
    }
    if (!isDeleting && index === textToType.length) {
        isDeleting = true;
        speed = 2000; // delay before deleting text in milliseconds
    } else if (isDeleting && index === 0) {
        isDeleting = false;
        speed = 100; // typing speed after deleting text in milliseconds
    }

    setTimeout(typeText, speed);
}

// Start typing simulation
typeText();

// Change theme function
function changeTheme(color) {
    localStorage.setItem('savedTheme', color);
    savedTheme = localStorage.getItem('savedTheme');

    document.body.className = color;

    color === 'darker' ?
        document.getElementById('title').classList.add('darker-title')
        : document.getElementById('title').classList.remove('darker-title');

    document.querySelector('input').className = `${color}-input`;

    document.querySelectorAll('.todo').forEach(todo => {
        Array.from(todo.classList).some(item => item === 'completed') ?
            todo.className = `todo ${color}-todo completed`
            : todo.className = `todo ${color}-todo`;
    });

    document.querySelectorAll('button').forEach(button => {
        Array.from(button.classList).some(item => {
            if (item === 'check-btn') {
                button.className = `check-btn ${color}-button`;
            } else if (item === 'delete-btn') {
                button.className = `delete-btn ${color}-button`;
            } else if (item === 'todo-btn') {
                button.className = `todo-btn ${color}-button`;
            }
        });
    });
}
