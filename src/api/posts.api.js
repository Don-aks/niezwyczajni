import api from './api';

export const getPosts = (params = {}) => api.getAll('post', params);
export const getPostBySlug = (slug) => api.getBySlug('post', slug);
