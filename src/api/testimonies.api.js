import api from './api';

export const getPosts = (params = {}) => api.getAll('testimony', params);
export const getPostBySlug = (slug) => api.getBySlug('testimony', slug);
