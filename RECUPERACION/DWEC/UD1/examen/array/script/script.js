const $equipos = (function () {
    let datos = [
      { equipoId: 1, aula: "A1", estado: "operativo", tipo: "sobremesa" },
      { equipoId: 2, aula: "A2", estado: "averiado", tipo: "portátil" },
      { equipoId: 3, aula: "A1", estado: "pendiente revisión", tipo: "sobremesa" },
      { equipoId: 4, aula: "A3", estado: "operativo", tipo: "portátil" },
      { equipoId: 5, aula: "A2", estado: "averiado", tipo: "sobremesa" },
      { equipoId: 6, aula: "A4", estado: "operativo", tipo: "sobremesa" },
      { equipoId: 7, aula: "A1", estado: "operativo", tipo: "portátil" },
      { equipoId: 8, aula: "A3", estado: "pendiente revisión", tipo: "sobremesa" },
      { equipoId: 9, aula: "A2", estado: "averiado", tipo: "portátil" },
      { equipoId: 10, aula: "A4", estado: "operativo", tipo: "portátil" },
      { equipoId: 11, aula: "A1", estado: "averiado", tipo: "sobremesa" },
      { equipoId: 12, aula: "A3", estado: "operativo", tipo: "sobremesa" },
      { equipoId: 13, aula: "A2", estado: "pendiente revisión", tipo: "sobremesa" },
      { equipoId: 14, aula: "A4", estado: "averiado", tipo: "portátil" },
      { equipoId: 15, aula: "A3", estado: "operativo", tipo: "portátil" }
    ];

    function listarAveriados() {
      return datos
        .filter(e => e.estado === "averiado")
        .map(e => ({ equipoId: e.equipoId, aula: e.aula, tipo: e.tipo }))
        .sort((a, b) => a.aula.localeCompare(b.aula));
    }

    function estadisticasPorAula() {
      const agrupado = {};

      datos.forEach(e => {
        if (!agrupado[e.aula]) {
          agrupado[e.aula] = { totalEquipos: 0, averiados: 0, operativos: 0 };
        }

        agrupado[e.aula].totalEquipos++;
        if (e.estado === "averiado") agrupado[e.aula].averiados++;
        if (e.estado === "operativo") agrupado[e.aula].operativos++;
      });

      return Object.entries(agrupado)
        .map(([aula, stats]) => ({
          aula,
          totalEquipos: stats.totalEquipos,
          averiados: stats.averiados,
          porcentajeOperativos: Number(((stats.operativos / stats.totalEquipos) * 100).toFixed(2))
        }))
        .sort((a, b) => b.totalEquipos - a.totalEquipos);
    }

    function obtenerJSON() {
      return JSON.stringify(datos, null, 2);
    }

    function cargarDesdeJSON(cadena) {
      try {
        const nuevo = JSON.parse(cadena);
        if (Array.isArray(nuevo)) {
          datos = nuevo;
          console.log("Datos cargados correctamente.");
        } else {
          console.error("El JSON no es un array.");
        }
      } catch (e) {
        console.error("Error al parsear el JSON:", e.message);
      }
    }

    return {
      listarAveriados,
      estadisticasPorAula,
      obtenerJSON,
      cargarDesdeJSON
    };
  })();

  // DOM Listeners
  document.addEventListener("DOMContentLoaded", () => {
    const resultado = document.getElementById("resultado");

    document.getElementById("btn-averiados").addEventListener("click", () => {
      const res = $equipos.listarAveriados();
      resultado.textContent = JSON.stringify(res, null, 2);
    });

    document.getElementById("btn-estadisticas").addEventListener("click", () => {
      const res = $equipos.estadisticasPorAula();
      resultado.textContent = JSON.stringify(res, null, 2);
    });

    document.getElementById("btn-json").addEventListener("click", () => {
      resultado.textContent = $equipos.obtenerJSON();
    });

    document.getElementById("btn-cargar").addEventListener("click", () => {
      const cadena = document.getElementById("jsonInput").value;
      $equipos.cargarDesdeJSON(cadena);
    });
  });