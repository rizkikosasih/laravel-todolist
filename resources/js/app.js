import './bootstrap';
import './../css/app.css';
import './library';

document.addEventListener('DOMContentLoaded', () => {
  const html = document.querySelector('html');
  const baseUrl = html.dataset.url + '/';
  const siteUrl = (path = '') => {
    let requestPath = '';
    if (path) {
      requestPath = path && path.substring(0, 1) !== '/' ? path : path.slice(1);
    }
    return baseUrl + requestPath;
  };

  const fv = document.querySelector('.form-validate');
  fv.addEventListener('submit', e => {
    const _this = e.currentTarget;
    e.preventDefault();
    e.stopPropagation();
    console.info(siteUrl(_this.attributes));
  });
});
