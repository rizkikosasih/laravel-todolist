/** Import Stylesheet */
import './../vendor/font/tabler-icons.scss';
import './../scss/app.scss';

/** Import Vendor JS */
import './../vendor/libs/bootstrap';
import './../vendor/libs/sweetalert2';

/** Import Requirement */
import { html } from './constant/constants';
import { getPreferredTheme, setStoredTheme } from './constant/theme';

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* Theme */
  if (getPreferredTheme() !== html.dataset.bsTheme) {
    setStoredTheme(getPreferredTheme());
  }

  /* To initialize tooltip */
  new bootstrap.Tooltip(document.documentElement, {
    animation: true,
    html: true,
    selector: '.tooltips, [data-popup=tooltip-custom]',
    placement: (context) => {
      const placement = context._element.dataset.placement;
      if (placement) {
        return placement;
      } else {
        return 'auto';
      }
    },
  });

  const btnTheme = document.querySelector('#btn-theme');
  if (btnTheme) {
    btnTheme.addEventListener('click', (e) => {
      e.preventDefault();
      setStoredTheme(html.dataset.bsTheme === 'dark' ? 'light' : 'dark');
    });
  }

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
