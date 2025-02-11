import '../App.css'
function HomePage() {
    return (<>
        <div id="banner">
            <p id="titulos-banner">
                <h1 id="titulo-banner">TORNEO SOLIDARIO 2025 - TORRELAVEGA</h1>
                <h3 id="subtitulo-banner">Aplicacion web que visualice la celebracion de un torneo de futbol solidario que se celebrara en la sede de Torrelavega</h3>
            </p>
        </div>
        <div className="container" id="container-carrusel">
            <div id="carouselExampleIndicators" className="carousel slide">
                <div className="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <img id="imagen-carrusel" src="../../public/images/futbolSala.jpeg" className="d-block w-100" alt="..." />
                        <div className="carousel-caption d-none d-md-block" id="descripcion-carrusel">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img id="imagen-carrusel" src="../../public/images/futbolSala2.jpg" className="d-block w-100" alt="..." />
                        <div className="carousel-caption d-none d-md-block" id="descripcion-carrusel">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img id="imagen-carrusel" src="../../public/images/futbolSala3.jpg" className="d-block w-100" alt="..." />
                        <div className="carousel-caption d-none d-md-block" id="descripcion-carrusel">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
                <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Previous</span>
                </button>
                <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div>
            <h2>Donaciones</h2>
            <div className="container text-center">
                <div className="row">
                    <div className="col">
                        <div className="card">
                            <img src="../../public/images/cruzRoja.jpg" className="card-img-top" id="imagen-donacion" alt="..." />
                            <div className="card-body">
                                <h5 className="card-title">Fundacion colaboradora</h5>
                                <p className="card-text">El dinero recaudado ira destinado a la Cruz Roja de Torrelavega para objetos de primera necesidad.</p>
                                <a href="#" className="btn btn-primary">Cruz Roja</a>
                            </div>
                        </div>
                    </div>
                    <div className="col">
                        <div className="card">
                            <img src="../../public/images/donacion.jpg" className="card-img-top" id="imagen-donacion" alt="..." />
                            <div className="card-body">
                                <h5 className="card-title">Realizar donaciones</h5>
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                <a href="#" className="btn btn-primary">Donar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </>)
}
export default HomePage;
