import client from './wpClient';

function getAll(type, params = {}) {
  const { perPage, page } = params;

  return client.request(type, {
    per_page: perPage,
    page,
  });
}

async function getBySlug(type, slug) {
  const items = await client.request(type, { slug });
  return items[0];
}

function search(type, { query, category }) {
  return client.request(type, {
    search: query,
    categories: category,
  });
}

export default {
  getAll,
  getBySlug,
  search,
};
