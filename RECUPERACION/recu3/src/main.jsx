import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './styles/estilos.css'
import App from './App.jsx'
import AppEnrutador from '../routers/AppEnrutador.jsx'
import { AlumnosProvider } from './context/AlumnosContext.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    {/* <App /> */}
    <AlumnosProvider>
      <AppEnrutador />  
    </AlumnosProvider>
    {/* <AppEnrutador /> */}
  </StrictMode>,
)
