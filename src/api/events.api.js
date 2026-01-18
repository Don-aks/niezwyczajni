import api from './api';

export const getEvents = (params = {}) => api.getAll('event', params);
export const getEventBySlug = (slug) => api.getBySlug('event', slug);
