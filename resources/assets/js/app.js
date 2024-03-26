import './../vendor/libs/bootstrap';
import './../vendor/libs/sweetalert2';
import './../vendor/font/tabler-icons.scss';
import './../css/app.css';
import { html } from './constant/constants';
import { getPreferredTheme, setStoredTheme } from './constant/theme';

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* Theme */
  if (getPreferredTheme() !== html.dataset.bsTheme) {
    setStoredTheme(getPreferredTheme());
  }

  const btnTheme = document.querySelector('#btn-theme');
  btnTheme.addEventListener('click', (e) => {
    e.preventDefault();
    setStoredTheme(html.dataset.bsTheme === 'dark' ? 'light' : 'dark');
  });

  const fvList = document.querySelectorAll('.form-validate');
  Array.from(fvList).forEach((fv) => {
    fv.reset();
    fv.addEventListener('submit', (e) => {
      const _this = e.currentTarget;

      if (!_this.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        _this.classList.add('was-validated');
      }
    });
  });
});
