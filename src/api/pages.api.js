import api from './api';

const getPageBySlug = (slug) => api.getBySlug('pages', slug);

export default getPageBySlug;
