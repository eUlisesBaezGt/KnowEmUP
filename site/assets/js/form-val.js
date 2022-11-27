// const ID = document.getElementById('fid');
// const PW = document.getElementById('password');
//
// const form = document.getElementById('form');
//
//
// form.addEventListener('submit', function (e) {
//     e.preventDefault();
//
//     let vID = idCheck(), vPW = passCheck();
//
//     let valid = vID && vPW;
//
//     // IF ALL FIELDS ARE VALID, SUBMIT FORM using AJAX
//     if (valid) {
//         form.submit();
//
//     }
// });
//
// const debounce = (fn, delay = 500) => {
//     let timeoutId;
//     return (...args) => {
//         if (timeoutId) {
//             clearTimeout(timeoutId);
//         }
//         timeoutId = setTimeout(() => {
//             fn.apply(null, args);
//         }, delay);
//     };
// }
//
// form.addEventListener('submit', debounce(function (e) {
//     switch (e.target.id) {
//         case 'fid':
//             idCheck();
//             break;
//         case 'password':
//             passCheck();
//             break;
//     }
// }));
//
// const showError = (input, message) => {
//     const formControl = input.parentElement;
//     formControl.classList.remove('success');
//     formControl.classList.add('error');
//
//     const error = formControl.querySelector('small');
//     error.innerText = message;
// }
//
// const showSuccess = (input) => {
//     const formControl = input.parentElement;
//     formControl.classList.remove('error');
//     formControl.classList.add('success');
//
//     const error = formControl.querySelector('small');
//     error.innerText = '';
// }
//
// /*ID MUST START WITH 0 AND MUST BE ONLY 7 NUMBERS*/
// function idCheck() {
//     if (ID.value.charAt(0) === '0' && ID.value.length === 7) {
//         showSuccess(ID);
//         passCheck();
//     } else {
//         showError(ID, 'ID must start with 0 and must be 7 numbers');
//         return false;
//     }
// }
//
// /*VALIDATE PASSWORDS WITH REGEX*/
// function passCheck() {
//     const pass = PW.value().trim();
//
//     // IF IS EMPTY, SHOW ALERT
//     if (pass === '') {
//         showError(PW, 'Password cannot be empty');
//         return false;
//     }
//     // CHECK IF PASSWORD HAS AT LEAST 8 CHARACTERS, 1 UPPERCASE, 1 LOWERCASE, 1 NUMBER, 1 SPECIAL CHARACTER
//     if (pass.length < 8 || pass.search(/[a-z]/) < 0 || pass.search(/[A-Z]/) < 0 || pass.search(/[0-9]/) < 0
//         || pass.search(/[^a-zA-Z0-9]/) < 0) {
//         showError(PW, 'Password must have at least 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character');
//         return false;
//     } else {
//         // IF PASSWORD IS VALID
//         showSuccess(PW);
//         return true;
//     }
// }