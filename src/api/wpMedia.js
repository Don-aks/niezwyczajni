const mediaCache = new Map();

export async function getMediaById(id) {
  if (!id) return null;

  if (mediaCache.has(id)) {
    return mediaCache.get(id);
  }

  const res = await fetch(`/wp-json/wp/v2/media/${id}`);
  if (!res.ok) return null;

  const data = await res.json();
  mediaCache.set(id, data);

  return data;
}
