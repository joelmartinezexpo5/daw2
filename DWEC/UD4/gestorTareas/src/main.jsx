import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import GestorTareas from './components/gestorTareas'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    {/* <App /> */}
    <GestorTareas />
  </StrictMode>,
)
