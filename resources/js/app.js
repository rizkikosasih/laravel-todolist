import './bootstrap';
import './../css/app.css';
import './library';

document.addEventListener('DOMContentLoaded', () => {
  const html = document.querySelector('html');
  const baseUrl = html.dataset.url + '/';
  const siteUrl = path => {
    let requestPath = '';
    if (path && typeof path === 'string') {
      requestPath = path && path.charAt(0) !== '/' ? path : path.slice(1);
    }
    return baseUrl + requestPath;
  };

  const fv = document.querySelector('.form-validate');
  fv.reset();
  fv.addEventListener('submit', e => {
    const _this = e.currentTarget;
    const {
      action: { value: action }
    } = _this.attributes;
    e.preventDefault();
    e.stopPropagation();

    if (!_this.checkValidity()) {
      _this.classList.add('was-validated');
    } else {
      const { value: btnSubmit } = document.querySelector('#submit-form').attributes;
      btnSubmit.value = 'Wait ...';
      const formData = new FormData(_this);

      /* Request AXIS */
      axios
        .post(siteUrl(action), formData)
        .then(response => {
          btnSubmit.value = 'Submit';
          const { data, status } = response;
          if (status !== 200) {
            return location.reload();
          }

          if (data.code !== 200) {
            const messageError = document.querySelector('#message-error');
            messageError.classList.remove('d-none');
            messageError.innerHTML = data.message || data.error;
          } else {
            location.href = siteUrl('/home');
          }
        })
        .catch(function (error) {
          btnSubmit.value = 'Submit';
          console.log(error);
        });
    }
  });
});
