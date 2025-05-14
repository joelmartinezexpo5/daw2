const Aplicacion = (() => {
  const URL_API = 'https://jsonplaceholder.typicode.com';
  
  const obtenerDatos = async (entidad, parametros = {}) => {
    try {
      let url = `${URL_API}/${entidad}`;
      const parametrosConsulta = new URLSearchParams(parametros).toString();
      if (parametrosConsulta) url += `?${parametrosConsulta}`;
      
      const respuesta = await fetch(url);
      if (!respuesta.ok) throw new Error('Error en la respuesta del servidor');
      
      // Para obtener el conteo real de elementos (API simula con X-Total-Count)
      const total = respuesta.headers.get('x-total-count');
      const datos = await respuesta.json();
      
      return { datos, total: total ? parseInt(total) : datos.length };
    } catch (error) {
      console.error(`Error al obtener ${entidad}:`, error);
      throw error;
    }
  };

  const obtenerConteosEntidades = async () => {
    const entidades = ['users', 'todos', 'posts', 'comments', 'albums', 'photos'];
    const conteos = {};
    
    await Promise.all(entidades.map(async entidad => {
      try {
        const { total } = await obtenerDatos(entidad, { _limit: 1 });
        conteos[entidad] = total;
      } catch (error) {
        conteos[entidad] = 'Error';
      }
    }));
    
    return conteos;
  };

  const cargarDatosPaginados = async (entidad, pagina = 1, porPagina = 10, filtro = '', filtroId = null) => {
    const inicio = (pagina - 1) * porPagina;
    let parametros = { _start: inicio, _limit: porPagina };
    
    if (filtroId) {
      parametros = { ...parametros, ...filtroId };
    }
    
    try {
      const { datos, total } = await obtenerDatos(entidad, parametros);
      let datosFiltrados = datos;
      
      if (filtro) {
        const campoPrincipal = obtenerCampoPrincipal(entidad);
        datosFiltrados = datos.filter(item => 
          String(item[campoPrincipal]).toLowerCase().includes(filtro.toLowerCase())
        );
      }
      
      return { datos: datosFiltrados, total };
    } catch (error) {
      throw error;
    }
  };

  const obtenerDatosFiltradosPorId = async (entidad, campoId, valorId) => {
    try {
      // Endpoints que soportan filtrado directo
      const endpointsConFiltro = ['todos', 'posts', 'comments', 'albums', 'photos'];
      
      if (endpointsConFiltro.includes(entidad)) {
        return await obtenerDatos(entidad, { [campoId]: valorId });
      }
      
      // Para otros endpoints, obtener todos y filtrar en cliente
      const todosLosDatos = await obtenerDatos(entidad);
      return todosLosDatos.datos.filter(item => item[campoId] == valorId);
    } catch (error) {
      throw error;
    }
  };

  const obtenerCampoPrincipal = (entidad) => {
    const campos = {
      users: 'name',
      todos: 'title',
      posts: 'title',
      comments: 'name',
      albums: 'title',
      photos: 'title'
    };
    return campos[entidad] || 'id';
  };

  const guardarPreferencia = (entidad, porPagina) => {
    localStorage.setItem(`pref_${entidad}`, porPagina);
  };

  const obtenerPreferencia = (entidad) => {
    return localStorage.getItem(`pref_${entidad}`) || 10;
  };

  return {
    obtenerDatos,
    obtenerConteosEntidades,
    cargarDatosPaginados,
    obtenerDatosFiltradosPorId,
    obtenerCampoPrincipal,
    guardarPreferencia,
    obtenerPreferencia
  };
})();

export default Aplicacion;