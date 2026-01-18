import api from './api';

export const getBooks = (params = {}) => api.getAll('book', params);
export const getBookBySlug = (slug) => api.getBySlug('book', slug);
