import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import AppEnrutador from './routers/AppEnrutador'
import { AuthProvider } from './context/AuthContext'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <AuthProvider>
      <AppEnrutador />
    </AuthProvider>
  </StrictMode>,
)
