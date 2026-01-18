import SITE_URL from '@/constants/siteUrl';

const API_BASE = `${SITE_URL}/wp-json/wp/v2`;

async function request(endpoint, params = {}) {
  const url = new URL(`${API_BASE}/${endpoint}`);

  Object.entries(params).forEach(([key, value]) => {
    if (value !== undefined) {
      url.searchParams.append(key, String(value));
    }
  });

  const response = await fetch(url);

  if (!response.ok) {
    const text = await response.text();
    throw new Error(`WP API error ${response.status}: ${text}`);
  }

  return response.json();
}

export default { request };
