import { baseUrl } from './constants';

export const siteUrl = (path) => {
  let requestPath = '';
  if (path && typeof path === 'string') {
    requestPath = path && path.charAt(0) !== '/' ? path : path.slice(1);
  }
  return baseUrl + requestPath;
};

export const loadUrl = (url) => {
  if (url) {
    return (location.href = url);
  }
  return (location.href = siteUrl());
};
