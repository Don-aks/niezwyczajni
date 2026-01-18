import api from './api';

export const getVideos = (params = {}) => api.getAll('video', params);
