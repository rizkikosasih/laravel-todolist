import './bootstrap';
import './../css/app.css';
import './library';

const html = document.querySelector('html');
const baseUrl = html.dataset.url + '/';
const siteUrl = path => {
  let requestPath = '';
  if (path && typeof path === 'string') {
    requestPath = path && path.charAt(0) !== '/' ? path : path.slice(1);
  }
  return baseUrl + requestPath;
};
const loadUrl = url => {
  if (url) {
    return (location.href = url);
  }
  return (location.href = siteUrl());
};
const setCookie = (cname, cvalue) => {
  const expires = new Date(new Date().getTime() + 1000 * 60 * 60 * 24 * 365).toGMTString();
  document.cookie = `${cname}=${cvalue};expires=${expires};path=/`;
};
const getCookie = cname => {
  let name = `${cname}=`;
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
};
const getStoredTheme = () => getCookie('theme');
const setStoredTheme = theme => loadUrl(setCookie('theme', theme));
const getPreferredTheme = () => {
  const storedTheme = getStoredTheme();
  if (storedTheme) {
    return storedTheme;
  }

  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
};

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  /* Theme */
  if (getPreferredTheme() !== html.dataset.bsTheme) {
    setStoredTheme(getPreferredTheme());
  }

  const fvList = document.querySelectorAll('.form-validate');
  Array.from(fvList).forEach(fv => {
    fv.reset();
    fv.addEventListener('submit', e => {
      const _this = e.currentTarget;

      if (!_this.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        _this.classList.add('was-validated');
      }
    });
  });
});
