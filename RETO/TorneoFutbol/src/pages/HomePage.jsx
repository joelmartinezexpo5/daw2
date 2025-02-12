import '../App.css';

function HomePage() {
    return (
        <>
            {/* Hero Section con efecto de partículas y neón */}
            <section className="inicio-section">
                <div className="inicio-content">
                    <h1 className="inicio-titulo">TORNEO SOLIDARIO 2025</h1>
                    <p className="inicio-subtitulo">Un evento que une deporte y solidaridad en Torrelavega</p>
                    <a href="#donaciones" className="inicio-boton">¡Únete ahora!</a>
                </div>
            </section>

            {/* Sección del Estadio */}
            <section className="estadio-section">
                <div className="estadio-container">
                    <h2 className="estadio-title">Explora el estadio</h2>
                    <div className="estadio-image">
                        <img src="../../public/images/estadio.jpeg" alt="Estadio" className="estadio" />
                        <div className="estadio-overlay"></div>
                    </div>
                </div>
            </section>

            {/* Sección de Donaciones con tarjetas 3D */}
            <section id="donaciones" className="donaciones-section">
                <div className="container">
                    <h2 className="section-title">¿Cómo puedes ayudar?</h2>
                    <div className="row">
                        <div className="col-md-6">
                            <div className="donacion-card">
                                <div className="card-front">
                                    <img src="../../public/images/cruzRoja.jpg" alt="Cruz Roja" />
                                    <h3>Fundación colaboradora</h3>
                                </div>
                                <div className="card-back">
                                    <p>El dinero recaudado irá destinado a la Cruz Roja de Torrelavega para objetos de primera necesidad.</p>
                                    <a href="#" className="donacion-button">Conoce más</a>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="donacion-card">
                                <div className="card-front">
                                    <img src="../../public/images/donacion.jpg" alt="Donación" />
                                    <h3>Realiza una donación</h3>
                                </div>
                                <div className="card-back">
                                    <p>Tu contribución ayuda a financiar este evento y a apoyar a las familias necesitadas de Torrelavega.</p>
                                    <a href="#" className="donacion-button">Donar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Sección de Sponsors y Colaboradores */}
            <section className="sponsors-section">
                <div className="container">
                    <h2 className="section-title">Patrocinadores y Colaboradores</h2>
                    <div className="sponsors-grid">
                        <div className="sponsor-card">
                            <a href="https://www.educantabria.es/web/ies-miguel-herrero-pereda" target='_blank'>
                                <img src="../../public/images/logoIESMHP.png"/>
                            </a> 
                        </div>
                        <div className="sponsor-card">
                            <a href="https://www.ieszapaton.es" target='_blank'>
                                <img src="../../public/images/logo_zapaton.jpg"/>
                            </a>
                        </div>
                        <div className="sponsor-card">
                            <a href="https://www.educantabria.es/web/ies-besaya" target='_blank'>
                                <img src="../../public/images/Logo__Besaya.png"/>
                            </a>
                        </div>
                        <div className="sponsor-card">
                            <img src="../../public/images/sponsor4.png"/>
                        </div>
                        <div className="sponsor-card">
                            <img src="../../public/images/sponsor5.png"/>
                        </div>
                        <div className="sponsor-card">
                            <img src="../../public/images/sponsor6.png"/>
                        </div>
                    </div>
                </div>
            </section>

            {/* Footer con efecto de neón */}
            <footer className="footer-section">
                <div className="container">
                    <div className="row">
                        <div className="col-md-6">
                            <h3>TORNEO SOLIDARIO 2025</h3>
                            <p>Un evento deportivo y solidario en Torrelavega.</p>
                        </div>
                        <div className="col-md-6">
                            <h3>Contacto</h3>
                            <p>Email: info@torneosolidario.com</p>
                            <p>Teléfono: +34 123 456 789</p>
                        </div>
                    </div>
                </div>
            </footer>
        </>
    );
}

export default HomePage;