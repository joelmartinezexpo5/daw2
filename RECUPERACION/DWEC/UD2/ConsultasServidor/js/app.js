// Clase autoinvocada para la lógica principal
const Aplicacion = (() => {
  const URL_API = 'https://jsonplaceholder.typicode.com';
  
  const obtenerDatos = async (entidad, parametros = {}) => {
    try {
      let url = `${URL_API}/${entidad}`;
      const parametrosConsulta = new URLSearchParams(parametros).toString();
      if (parametrosConsulta) url += `?${parametrosConsulta}`;
      
      const respuesta = await fetch(url);
      if (!respuesta.ok) throw new Error('Error en la respuesta del servidor');
      return await respuesta.json();
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
        const datos = await obtenerDatos(entidad, { _limit: 1 });
        conteos[entidad] = datos.length;
      } catch (error) {
        conteos[entidad] = 'Error';
      }
    }));
    
    return conteos;
  };

  const cargarDatosPaginados = async (entidad, pagina = 1, porPagina = 10, filtro = '') => {
    const inicio = (pagina - 1) * porPagina;
    let parametros = { _start: inicio, _limit: porPagina };
    
    try {
      let datos = await obtenerDatos(entidad, parametros);
      
      if (filtro) {
        const campoPrincipal = obtenerCampoPrincipal(entidad);
        datos = datos.filter(item => 
          String(item[campoPrincipal]).toLowerCase().includes(filtro.toLowerCase())
        );
      }
      
      return datos;
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
    obtenerCampoPrincipal,
    guardarPreferencia,
    obtenerPreferencia
  };
})();

export default Aplicacion;