import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import {
  obtenerPracticas,
  eliminarPractica,
} from "../services/practicasService";

const PracticasPage = () => {
  const [practicas, setPracticas] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    cargarPracticas();
  }, []);

  const cargarPracticas = async () => {
    try {
      const data = await obtenerPracticas();
      setPracticas(data);
    } catch (error) {
      console.error("Error al cargar prácticas", error);
    }
  };

  const handleEditar = (id) => {
    navigate(`/practicas/editar/${id}`);
  };

  const handleEliminar = async (id) => {
    if (!window.confirm("¿Seguro que deseas eliminar esta práctica?")) return;
    try {
      await eliminarPractica(id);
      cargarPracticas();
    } catch (err) {
      console.error("Error al eliminar práctica", err);
    }
  };

  return (
    <div>
      <h2>Listado de Prácticas</h2>
      <div className="tabla">
        <div className="linea cabecera">
          <div>ID</div>
          <div>Alumno ID</div>
          <div>Empresa ID</div>
          <div>Inicio</div>
          <div>Fin</div>
          <div>Acciones</div>
        </div>

        {practicas.map((practica) => (
          <div key={practica.practicaId} className="linea">
            <div>{practica.practicaId}</div>
            <div>{practica.alumnoId}</div>
            <div>{practica.empresaId}</div>
            <div>{practica.fechaInicio}</div>
            <div>{practica.fechaFin}</div>
            <div>
              <button onClick={() => handleEditar(practica.practicaId)}>Editar</button>
              <button onClick={() => handleEliminar(practica.practicaId)}>Eliminar</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default PracticasPage;











// import { useEffect, useState } from "react";
// import {
//   obtenerPracticas,
//   actualizarPractica,
//   eliminarPractica,
// } from "../services/practicasService";
// import { obtenerAlumnos } from "../services/alumnosService";
// import { obtenerEmpresas } from "../services/empresasService";

// const PracticasPage = () => {
//   const [practicas, setPracticas] = useState([]);
//   const [alumnos, setAlumnos] = useState([]);
//   const [empresas, setEmpresas] = useState([]);
//   const [editandoId, setEditandoId] = useState(null);
//   const [practicaEditada, setPracticaEditada] = useState({});

//   useEffect(() => {
//     async function fetchData() {
//       try {
//         const practicasData = await obtenerPracticas();
//         setPracticas(practicasData);

//         const alumnosData = await obtenerAlumnos();
//         setAlumnos(alumnosData);

//         const empresasData = await obtenerEmpresas();
//         setEmpresas(empresasData);
//       } catch (error) {
//         console.error("Error cargando datos:", error);
//       }
//     }

//     fetchData();
//   }, []);

//   const getAlumnoById = (id) =>
//     alumnos.find((a) => a.id === id || a.alumnoId === id);
//   const getEmpresaById = (id) =>
//     empresas.find((e) => e.id === id || e.empresaId === id);

//   const handleEditar = (practica) => {
//     setEditandoId(practica.practicaId);
//     setPracticaEditada({ ...practica });
//   };

//   const handleCancelar = () => {
//     setEditandoId(null);
//     setPracticaEditada({});
//   };

//   const handleGuardar = async () => {
//     try {
//       const updated = await actualizarPractica(practicaEditada);
//       setPracticas((prev) =>
//         prev.map((p) =>
//           p.practicaId === updated.practicaId ? updated : p
//         )
//       );
//       setEditandoId(null);
//       setPracticaEditada({});
//     } catch (error) {
//       console.error("Error al guardar práctica:", error);
//     }
//   };

//   const handleEliminar = async (id) => {
//     try {
//       await eliminarPractica(id);
//       setPracticas((prev) => prev.filter((p) => p.practicaId !== id));
//     } catch (error) {
//       console.error("Error al eliminar práctica:", error);
//     }
//   };

//   const handleChange = (e) => {
//     const { name, value } = e.target;
//     setPracticaEditada((prev) => ({
//       ...prev,
//       [name]: value,
//     }));
//   };

//   return (
//     <div>
//       <h2>Listado de Prácticas</h2>
//       <div className="tabla">
//         <div className="linea cabecera">
//           <div>ID Práctica</div>
//           <div>Alumno</div>
//           <div>Empresa</div>
//           <div>Inicio</div>
//           <div>Fin</div>
//           <div>Acciones</div>
//         </div>
//         {practicas.map((practica) => {
//           const alumno = getAlumnoById(practica.alumnoId);
//           const empresa = getEmpresaById(practica.empresaId);
//           const editando = practica.practicaId === editandoId;

//           return (
//             <div key={practica.practicaId} className="linea">
//               <div>{practica.practicaId}</div>

//               <div>
//                 {editando ? (
//                   <select
//                     name="alumnoId"
//                     value={practicaEditada.alumnoId}
//                     onChange={handleChange}
//                   >
//                     {alumnos.map((a) => (
//                       <option key={a.alumnoId} value={a.alumnoId}>
//                         {a.nombre} {a.apellido}
//                       </option>
//                     ))}
//                   </select>
//                 ) : (
//                   alumno ? `${alumno.nombre} ${alumno.apellido}` : practica.alumnoId
//                 )}
//               </div>

//               <div>
//                 {editando ? (
//                   <select
//                     name="empresaId"
//                     value={practicaEditada.empresaId}
//                     onChange={handleChange}
//                   >
//                     {empresas.map((e) => (
//                       <option key={e.empresaId} value={e.empresaId}>
//                         {e.nombre}
//                       </option>
//                     ))}
//                   </select>
//                 ) : (
//                   empresa ? empresa.nombre : practica.empresaId
//                 )}
//               </div>

//               <div>
//                 {editando ? (
//                   <input
//                     type="date"
//                     name="fechaInicio"
//                     value={practicaEditada.fechaInicio}
//                     onChange={handleChange}
//                   />
//                 ) : (
//                   practica.fechaInicio
//                 )}
//               </div>

//               <div>
//                 {editando ? (
//                   <input
//                     type="date"
//                     name="fechaFin"
//                     value={practicaEditada.fechaFin}
//                     onChange={handleChange}
//                   />
//                 ) : (
//                   practica.fechaFin
//                 )}
//               </div>

//               <div>
//                 {editando ? (
//                   <>
//                     <button onClick={handleGuardar}>💾</button>
//                     <button onClick={handleCancelar}>✖️</button>
//                   </>
//                 ) : (
//                   <>
//                     <button onClick={() => handleEditar(practica)}>📝</button>
//                     <button onClick={() => handleEliminar(practica.practicaId)}>
//                       ❌
//                     </button>
//                   </>
//                 )}
//               </div>
//             </div>
//           );
//         })}
//       </div>
//     </div>
//   );
// };

// export default PracticasPage;
