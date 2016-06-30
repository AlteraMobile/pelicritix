-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2016 a las 01:40:43
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelicritix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `actor_id` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`actor_id`, `nombre`, `apellido`) VALUES
(1, 'Johnny', 'Depp'),
(2, 'Brad', 'Pitt'),
(3, 'Leonardo', 'DiCaprio'),
(4, 'Jennifer', 'Aniston'),
(5, 'Angelina', 'Jolie'),
(6, 'Cameron', 'Diaz'),
(7, 'Scarlett', 'Johansson'),
(8, 'George', 'Clooney'),
(9, 'Matt', 'Damon'),
(10, 'Ben', 'Affleck'),
(11, 'Meg', 'Ryan'),
(12, 'Tom', 'Hanks'),
(13, 'Dwayne', 'Johnson'),
(14, 'Jack', 'Black'),
(15, 'Sean', 'Connery'),
(16, 'Harrison', 'Ford'),
(17, 'Heath', 'Ledger'),
(18, 'Mel', 'Gibson'),
(19, 'Clint', 'Eastwood'),
(20, 'Robert', 'De Niro'),
(21, 'Catherine', 'Zeta-Jones'),
(22, 'Jackie', 'Chan'),
(23, 'Anthony', 'Hopkins'),
(24, 'Natalie', 'Portman'),
(25, 'Drew', 'Barrymore'),
(26, 'Michael', 'J. Fox'),
(27, 'Keanu', 'Reeves'),
(28, 'Al', 'Pacino'),
(29, 'Morgan', 'Freeman'),
(30, 'Robin', 'Williams'),
(31, 'Ben', 'Stiller'),
(32, 'Julia', 'Roberts'),
(33, 'Owen', 'Wilson'),
(34, 'Oralndo', 'Bloom'),
(35, 'Meryl', 'Streep'),
(36, 'Brendan', 'Fraser'),
(37, 'Martin', 'Lawrence'),
(38, 'Jack', 'Nicholson'),
(39, 'Samuel L.', 'Jackson'),
(41, 'Kevin', 'Spacey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(3) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `descripcion`) VALUES
(1, 'Drama'),
(2, 'Comedia'),
(3, 'Acción'),
(4, 'Aventura'),
(5, 'Terror'),
(6, 'Ciencia Ficción'),
(7, 'Romántico'),
(8, 'Musical'),
(9, 'Melodrama'),
(10, 'Catástrofe'),
(11, 'Suspenso'),
(12, 'Fantasía'),
(13, 'Pornográfico'),
(14, 'Explotación'),
(15, 'Histórico'),
(16, 'Policíaco'),
(17, 'Bélico'),
(18, 'Western'),
(19, 'Zombis'),
(20, 'Gore'),
(21, 'Misterio'),
(22, 'Animación'),
(23, 'Negro'),
(24, 'Surrealista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criticas`
--

CREATE TABLE `criticas` (
  `critica_id` int(10) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_critica` date NOT NULL,
  `usuario_id` int(10) DEFAULT NULL,
  `pelicula_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `criticas`
--

INSERT INTO `criticas` (`critica_id`, `comentario`, `fecha_critica`, `usuario_id`, `pelicula_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non enim lobortis, ornare risus quis, ornare ligula. Mauris sagittis mi metus, ut commodo leo porttitor sed. Pellentesque efficitur venenatis scelerisque. Duis faucibus vitae magna condimentum facilisis. Suspendisse tempor lectus enim, eget sodales neque mattis non. Curabitur malesuada a turpis at facilisis. Quisque pellentesque pretium porttitor. Proin in ante in risus sollicitudin consequat. In gravida mollis enim, a commodo quam suscipit vel. Donec eu turpis enim. Aliquam ac dapibus quam. Etiam congue facilisis augue, eget porta lectus feugiat nec. Donec sodales ex ut massa consectetur consequat. Aliquam non risus at mi cursus interdum in id massa. Praesent mauris diam, laoreet sit amet hendrerit non, scelerisque ac justo. Duis consectetur magna augue, sed bibendum est molestie id.', '2016-06-27', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `director_id` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`director_id`, `nombre`, `apellido`) VALUES
(1, 'Martin', 'Scorsese '),
(2, 'Quentin', 'Tarantino'),
(3, 'Steven', 'Spielberg'),
(4, 'Clint', 'Eastwood'),
(5, 'Pedro', 'Almodóvar'),
(6, 'Woody', 'Allen'),
(7, 'James', 'Cameron'),
(8, 'Stanley', 'Kubrick'),
(9, 'Ridley', 'Scott'),
(10, 'Luis', 'Buñuel'),
(11, 'Christopher', 'Nolan'),
(12, 'Alfred', 'Hitchcock'),
(13, 'Tim', 'Burton'),
(14, 'Akira', 'Kurosawa'),
(15, 'Roman', 'Polanski'),
(16, 'David', 'Lynch'),
(17, 'Ingmar', 'Bergman'),
(18, 'Federico', 'Fellini'),
(19, 'Charles', 'Chaplin'),
(20, 'Fritz', 'Lang'),
(22, 'Werner', 'Herzog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `genero_id` int(3) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`genero_id`, `descripcion`) VALUES
(1, 'Largometraje'),
(2, 'Cortometraje'),
(3, 'Documental'),
(4, 'Series');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculaactores`
--

CREATE TABLE `peliculaactores` (
  `pelicula_id` int(10) NOT NULL,
  `actor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `peliculaactores`
--

INSERT INTO `peliculaactores` (`pelicula_id`, `actor_id`) VALUES
(2, 5),
(2, 10),
(2, 23),
(2, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculacategorias`
--

CREATE TABLE `peliculacategorias` (
  `pelicula_id` int(10) NOT NULL,
  `categoria_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `peliculacategorias`
--

INSERT INTO `peliculacategorias` (`pelicula_id`, `categoria_id`) VALUES
(2, 1),
(2, 20),
(2, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(10) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `ano_produccion` year(4) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `nota` double(2,1) NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lo_mejor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lo_peor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_portada` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_trailer` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genero_id` int(3) DEFAULT NULL,
  `critica_id` int(10) NOT NULL,
  `director_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `titulo`, `subtitulo`, `fecha_estreno`, `ano_produccion`, `duracion`, `nota`, `color`, `lo_mejor`, `lo_peor`, `img_portada`, `url_trailer`, `genero_id`, `critica_id`, `director_id`) VALUES
(2, 'El último Rey', 'Birkebeinerne', '2016-05-01', 2015, '00:01:20', 5.6, 'Color', 'Que no la he visto', '', 'alicia.jpg', 'https://www.youtube.com/embed/VkHQdDxw9vY', 2, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombres`, `apellidos`, `fecha_nacimiento`, `nombre_usuario`, `pass`, `activo`) VALUES
(1, 'Katherine Andrea', 'Nussbaum Niccoli', '1979-03-04', 'kty', 'lolalola', 1),
(20, 'Admin', 'Admin', '2016-01-01', 'katherine', 'carolina', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `criticas`
--
ALTER TABLE `criticas`
  ADD PRIMARY KEY (`critica_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`director_id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `peliculaactores`
--
ALTER TABLE `peliculaactores`
  ADD PRIMARY KEY (`pelicula_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indices de la tabla `peliculacategorias`
--
ALTER TABLE `peliculacategorias`
  ADD PRIMARY KEY (`pelicula_id`,`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `critica_id` (`critica_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `actor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `criticas`
--
ALTER TABLE `criticas`
  MODIFY `critica_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `director_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `pelicula_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `criticas`
--
ALTER TABLE `criticas`
  ADD CONSTRAINT `Criticas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Filtros para la tabla `peliculaactores`
--
ALTER TABLE `peliculaactores`
  ADD CONSTRAINT `PeliculaActores_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`),
  ADD CONSTRAINT `PeliculaActores_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`actor_id`);

--
-- Filtros para la tabla `peliculacategorias`
--
ALTER TABLE `peliculacategorias`
  ADD CONSTRAINT `PeliculaCategorias_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`),
  ADD CONSTRAINT `PeliculaCategorias_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `Peliculas_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`genero_id`),
  ADD CONSTRAINT `Peliculas_ibfk_2` FOREIGN KEY (`critica_id`) REFERENCES `criticas` (`critica_id`),
  ADD CONSTRAINT `Peliculas_ibfk_3` FOREIGN KEY (`director_id`) REFERENCES `directores` (`director_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
