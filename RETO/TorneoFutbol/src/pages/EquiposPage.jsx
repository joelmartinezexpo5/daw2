function EquiposPage() {
    return (
        <>
            {/* Hero Section */}
            <section className="inicio-section">
                <div className="inicio-content">
                    <h1 className="inicio-titulo">Equipos Participantes</h1>
                    <p className="inicio-subtitulo">Conoce a los equipos que luchan por la solidaridad</p>
                </div>
            </section>

            {/* Listado de equipos */}
            <section className="teams-section">
                <div className="container">
                    <div className="row">
                        <div className="col-md-4">
                            <div className="team-card">
                                <img src="../../public/images/team1.jpg" alt="Equipo 1" />
                                <h3>Equipo A</h3>
                                <p>Descripción breve del equipo.</p>
                                <a href="#" className="team-button">Ver más</a>
                            </div>
                        </div>
                        {/* Repetir para más equipos */}
                    </div>
                </div>
            </section>
        </>
    )
}
export default EquiposPage;
