/**
 *    File        : frontend/js/api/apiFactory.js
 *    Project     : CRUD PHP
 *    Author      : Tecnologías Informáticas B - Facultad de Ingeniería - UNMdP
 *    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
 *    Date        : Mayo 2025
 *    Status      : Prototype
 *    Iteration   : 3.0 ( prototype )
 */

export function createAPI(moduleName, config = {}) {
  const API_URL = config.urlOverride ?? `../../backend/server.php?module=${moduleName}`;

  async function sendJSON(method, data) {
    const res = await fetch(API_URL, {
      method,
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });

    /**
     * Obtiene la respuesta del servidor.
     * Si no es exitosa, lanza un error con el mensaje de error del servidor.
     * Anteriormente, se verificaba si la respuesta era exitosa con `res.ok`, pero no se podia mostar el mensaje de error del servidor.
     */
    const data_res = await res.json();
    if (data_res?.error) throw new Error(`Error en ${method}: ${data_res.error}`);
    return data_res;
  }

  return {
    async fetchAll() {
      const res = await fetch(API_URL);
      if (!res.ok) throw new Error("No se pudieron obtener los datos");
      return await res.json();
    },
    async create(data) {
      return await sendJSON("POST", data);
    },
    async update(data) {
      return await sendJSON("PUT", data);
    },
    async remove(id) {
      return await sendJSON("DELETE", { id });
    },
  };
}
