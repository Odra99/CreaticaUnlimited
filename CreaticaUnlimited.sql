-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2020 a las 23:32:02
-- Versión del servidor: 5.7.31-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CreaticaUnlimited`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ADMINISTRADOR`
--

CREATE TABLE `ADMINISTRADOR` (
  `Usuario` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BOLETA`
--

CREATE TABLE `BOLETA` (
  `idBOLETA` int(11) NOT NULL,
  `Banco` varchar(45) NOT NULL,
  `monto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CURSO`
--

CREATE TABLE `CURSO` (
  `nombre` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL,
  `codigo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CURSO`
--

INSERT INTO `CURSO` (`nombre`, `area`, `codigo`) VALUES
('Inglés Avanzado', 'Idiomas', 101),
('Cocina Internacional', 'Cocina', 102),
('Edición de imagenes', 'Diseño', 103),
('Desarrollo Web', 'Software', 104),
('Oratoria y Lenguajes', 'Idiomas', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTUDIANTE`
--

CREATE TABLE `ESTUDIANTE` (
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HORARIO`
--

CREATE TABLE `HORARIO` (
  `codigoCurso` int(11) NOT NULL,
  `usuarioMaestro` varchar(50) NOT NULL,
  `costo` double NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `año` int(11) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HORARIOSEMANA`
--

CREATE TABLE `HORARIOSEMANA` (
  `codigo` int(11) NOT NULL,
  `lunes` tinyint(4) NOT NULL,
  `miercoles` tinyint(4) NOT NULL,
  `martes` tinyint(4) NOT NULL,
  `jueves` tinyint(4) NOT NULL,
  `viernes` tinyint(4) NOT NULL,
  `sabado` tinyint(4) NOT NULL,
  `domingo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INSCRITO`
--

CREATE TABLE `INSCRITO` (
  `codigoEstudiante` varchar(50) NOT NULL,
  `codigoCurso` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `idBoleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MAESTRO`
--

CREATE TABLE `MAESTRO` (
  `estado` varchar(15) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERFIL`
--

CREATE TABLE `PERFIL` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correoElectronico` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PERFIL`
--

INSERT INTO `PERFIL` (`nombre`, `apellido`, `correoElectronico`, `telefono`, `usuario`, `contraseña`) VALUES
('Daniel', 'Acevedo Jhong', 'acevedo_daniel@creatica.com', '192232', 'user1', 'JDJQOKS'),
('Marco Tulio', 'Alocen Barrera', 'alocen_marco@creatica.com', '207659', 'user10', 'IPIUSQA'),
('Alejandro', 'Vera Silva', 'vera_alejandro@creatica.com', '167244', 'user100', 'LNRAAWJ'),
('Blanca Katty', 'Vilca Lucero', 'vilca_blanca@creatica.com', '213318', 'user101', 'HJMFAGN'),
('Enrique Godofredo', 'Vilgoso Alvarado', 'vilgoso_enrique@creatica.com', '194518', 'user102', 'MXMVFSI'),
('Cecilia', 'Yamawaki Onaga', 'yamawaki_cecilia@creatica.com', '179883', 'user103', 'IYSIVYK'),
('Mariela Milagros', 'Zamalloa Vega', 'zamalloa_mariela@creatica.com', '146666', 'user104', 'RYCVPGY'),
('Monica ', 'Zapata Chang', 'zapata_monica@creatica.com', '198946', 'user105', 'ACHZAQH'),
('Juan Carlos', 'Zegarra Salcedo', 'zegarra_juan@creatica.com', '112752', 'user106', 'EOQGENP'),
('Hilrich Mariela', 'Zu Flores', 'zu_hilrich@creatica.com', '104005', 'user107', 'QVPQIQY'),
('Cesar', 'Baiocchi Ureta', 'baiocchi_cesar@creatica.com', '179600', 'user11', 'UZWAVCP'),
('Isela Flor', 'Baylón Rojas', 'baylon_isela@creatica.com', '103316', 'user12', 'JQUCQQF'),
('Leoncia', 'Bedoya Castillo', 'bedoya_leoncia@creatica.com', '105128', 'user13', 'VGYDJFF'),
('Luz Marina', 'Bedregal Canales', 'bedregal_luz@creatica.com', '191032', 'user14', 'CPNOOMG'),
('Ramiro Alberto', 'Bejar Torres', 'bejar_ramiro@creatica.com', '109697', 'user15', 'YGUFHMZ'),
('Javier', 'Benavides Espejo', 'benavides_javier@creatica.com', '126361', 'user16', 'KCLKYCD'),
('Nelson', 'Boza Solis', 'boza_nelson@creatica.com', '127472', 'user17', 'KPIJVIN'),
('Cielito Mercedes', 'Calle Betancourt', 'calle_cielito@creatica.com', '139395', 'user18', 'AZMFSEC'),
('Isabel Florisa', 'Caraza Villegas', 'caraza_isabel@creatica.com', '205870', 'user19', 'RHWYGLT'),
('Miguel Vicente', 'Agurto Rondoy', 'agurto_miguel@creatica.com', '157330', 'user2', 'UYKVFDH'),
('Gizella', 'Carrera Abanto', 'carrera_gizella@creatica.com', '111933', 'user20', 'WJGEUJO'),
('Estalins', 'Carrillo Segura', 'carrillo_estalins@creatica.com', '170401', 'user21', 'XAOWULS'),
('Jorge Augusto', 'Carrión Neira', 'carrion_jorge@creatica.com', '102049', 'user22', 'KWOZNDW'),
('Guillermo ', 'Casapia Valdivia', 'casapia_guillermo@creatica.com', '123639', 'user23', 'EEWXQTG'),
('Zarita', 'Chancos Mendoza', 'chancos_zarita@creatica.com', '189598', 'user24', 'SAUCFCF'),
('Carlos', 'Chirinos Lacotera', 'chirinos_carlos@creatica.com', '119192', 'user25', 'UPYZWZF'),
('Doris', 'Cores Moreno', 'cores_doris@creatica.com', '117036', 'user26', 'ILHPRKG'),
('Maribel Corina', 'Cortez Lozano', 'cortez_maribel@creatica.com', '171654', 'user27', 'QDQUUSQ'),
('Angel', 'Crispin Quispe', 'crispin_angel@creatica.com', '146300', 'user28', 'EBRCJNM'),
('Antonio ', 'De Loayza Conterno', 'de_antonio@creatica.com', '198068', 'user29', 'NOCCZFJ'),
('Christian Nelson', 'Alcalá Negrón', 'alcala_christian@creatica.com', '127203', 'user3', 'NPIAMAO'),
('Ana Maria', 'Diaz Salinas', 'diaz_ana@creatica.com', '208804', 'user30', 'LFONLLE'),
('Antonio ', 'Dueñas Aristisabal', 'duenias_antonio@creatica.com', '213087', 'user31', 'FJLZGLN'),
('Yuliana', 'Espinoza Arana', 'espinoza_yuliana@creatica.com', '193480', 'user32', 'ARAJVTY'),
('Carlos Enrique', 'Fernandez Guzman', 'fernandez_carlos@creatica.com', '183992', 'user33', 'ZBCKUMX'),
('Esther Aurora', 'Fernandez Matta', 'fernandez_esther@creatica.com', '195980', 'user34', 'GGSZMME'),
('Olga', 'Ferro Salas', 'ferro_olga@creatica.com', '148186', 'user35', 'RVTWYYR'),
('Edwin', 'Flores Romero', 'flores_edwin@creatica.com', '117302', 'user36', 'BOJPLVE'),
('Roberto', 'Gamarra Astete', 'gamarra_roberto@creatica.com', '120203', 'user37', 'ISHFGQU'),
('Gloria', 'Gamio Lozano', 'gamio_gloria@creatica.com', '105872', 'user38', 'PZKVZKR'),
('Miriam', 'García Peralta', 'garcia_miriam@creatica.com', '206896', 'user39', 'UELODDQ'),
('Raul Eduardo', 'Almora Hernandez', 'almora_raul@creatica.com', '164638', 'user4', 'RJJKQMH'),
('Arturo', 'Gonzales Del Valle Maguiño', 'gonzales_arturo@creatica.com', '165730', 'user40', 'LGPNWNI'),
('Marlene Victoria', 'Gonzales Huilca', 'gonzales_marlene@creatica.com', '172059', 'user41', 'FNNJFGT'),
('Elsa Patricia', 'Gonzales Medina', 'gonzales_elsa@creatica.com', '146196', 'user42', 'OQCNJHY'),
('Javier', 'Gutierrez Velez', 'gutierrez_javier@creatica.com', '154139', 'user43', 'SZOQBBL'),
('Elena Rosavelt', 'Guzman Chinag', 'guzman_elena@creatica.com', '210258', 'user44', 'LCQNUNR'),
('Clara', 'Guzman Quispe', 'guzman_clara@creatica.com', '126399', 'user45', 'MEWRPSW'),
('Milagros Susan ', 'Herrera Carbajal', 'herrera_milagros@creatica.com', '112638', 'user46', 'EVPMBEI'),
('Guillermo', 'Horruitiner Martinez', 'horruitiner_guillermo@creatica.com', '118187', 'user47', 'ZLDTVIX'),
('Lourdes', 'Huamani Flores', 'huamani_lourdes@creatica.com', '170465', 'user48', 'JFUNWDK'),
('Luis Armando', 'Huapaya Raygada', 'huapaya_luis@creatica.com', '214347', 'user49', 'UUJMRUJ'),
('Jorge ', 'Alosilla Velazco Vera', 'alosilla_jorge@creatica.com', '111364', 'user5', 'SLUYQOK'),
('Marcos', 'Huarcaya Quispe', 'huarcaya_marcos@creatica.com', '119566', 'user50', 'TGDRTOW'),
('Walter David', 'Huaytan Sauñe', 'huaytan_walter@creatica.com', '134591', 'user51', 'MDOGHNP'),
('Elba Mercedes ', 'La Rosa Fabian', 'larosa_elba@creatica.com', '145974', 'user52', 'ABLCROB'),
('Pedro Guillermo', 'Landa Ginocchio', 'landa_pedro@creatica.com', '125550', 'user53', 'UWXZPNH'),
('Roberto Julian', 'Llaja Tafur', 'llaja_roberto@creatica.com', '126237', 'user54', 'YRIUKNM'),
('Orfelina', 'Llenpen Nuñez', 'llenpen_orfelina@creatica.com', '199345', 'user55', 'PBHCVGT'),
('Hector', 'Lujan Venegas', 'lujan_hector@creatica.com', '211632', 'user56', 'ZXWIVOG'),
('Gissela', 'Maguiña San Yen Man', 'maguinia_gissela@creatica.com', '168089', 'user57', 'TJYWZCU'),
('Cosme Adolfo', 'Maldonado Quispe', 'maldonado_cosme@creatica.com', '112462', 'user58', 'NBFQSSL'),
('Sandra Monica', 'Maldonado Tinco', 'maldonado_sandra@creatica.com', '121064', 'user59', 'CDVJGSC'),
('Victor', 'Alva Campos', 'alva_victor@creatica.com', '206466', 'user6', 'VXFVPLR'),
('Jenny Maria', 'Mallqui Celestino', 'mallqui_jenny@creatica.com', '194165', 'user60', 'HKZGHNT'),
('Santiago', 'Mamani Uchasara', 'mamani_santiago@creatica.com', '159138', 'user61', 'LNRQFJG'),
('Magda Janeth', 'Maravi Navarro', 'maravi_magda@creatica.com', '130448', 'user62', 'TKQPJJX'),
('Martin', 'Martinez Marquez', 'martinez_martin@creatica.com', '196653', 'user63', 'OAOLUIU'),
('Oscar Enrique', 'Medina Zuta', 'medina_oscar@creatica.com', '189591', 'user64', 'GCINIFP'),
('Carlos P', 'Melgarejo Vibes', 'melgarejo_carlos@creatica.com', '130510', 'user65', 'IIDOBBS'),
('Elizabeth', 'Miguel Holgado', 'miguel_elizabeth@creatica.com', '109275', 'user66', 'EOKBJPU'),
('Manuel Antonio', 'Mori Ramirez', 'mori_manuel@creatica.com', '172747', 'user67', 'TPCHIJL'),
('Carlos Alberto', 'Nuñez Huayanay', 'nuniez_carlos@creatica.com', '171871', 'user68', 'GVWWGAX'),
('Olga', 'Ore Reyes', 'ore_olga@creatica.com', '107786', 'user69', 'SWGSBZE'),
('Javier', 'Arevalo Lopez', 'arevalo_javier@creatica.com', '179192', 'user7', 'QNNYUWB'),
('Josue', 'Orrillo Ortiz', 'orrillo_josue@creatica.com', '144280', 'user70', 'JWTXNKG'),
('Carmen Rosa', 'Pardave Camacho', 'pardave_carmen@creatica.com', '143315', 'user72', 'DEUAFIF'),
('Santiago Victor', 'Paredes Jaramillo', 'paredes_santiago@creatica.com', '187808', 'user73', 'XJJLHNS'),
('Arturo', 'Pastor Porras', 'pastor_arturo@creatica.com', '195118', 'user74', 'KHGVRYM'),
('Enrique', 'Pinedo Nuñez', 'pinedo_enrique@creatica.com', '117723', 'user75', 'GZWFOJN'),
('Sonia', 'Prada Vilchez', 'prada_sonia@creatica.com', '145235', 'user76', 'HWAYAJN'),
('Gerardo David', 'Riega Calle', 'riega_gerardo@creatica.com', '147058', 'user77', 'YZAQIRU'),
('Freddy', 'Rios Lima', 'rios_freddy@creatica.com', '112689', 'user78', 'NWFJLGU'),
('Teresa', 'Rios Lima', 'rios_teresa@creatica.com', '157770', 'user79', 'XTMMWPX'),
('Rosario', 'Arias Hernandez', 'arias_rosario@creatica.com', '138040', 'user8', 'FZPTZMK'),
('Juan Elvis', 'Riquelme Miranda', 'riquelme_juan@creatica.com', '125239', 'user80', 'SMXQLGN'),
('Georgina Esperanza', 'Roa Yanac', 'roa_georgina@creatica.com', '151121', 'user81', 'OFZUMCR'),
('Rosa Liliana', 'Robles Valverde', 'robles_rosa@creatica.com', '153727', 'user82', 'QMRYVLS'),
('Rosa Josefa', 'Rodriguez Farias', 'rodriguez_rosa@creatica.com', '152929', 'user83', 'GHDCJGW'),
('Maria De Fatima', 'Rojas Valdivia', 'rojas_maria@creatica.com', '140793', 'user84', 'AWHUGFH'),
('Rosa Maria', 'Romero Gomez Sanchez', 'romero_rosa@creatica.com', '136580', 'user85', 'ZZFGVRU'),
('Carina Magnolia', 'Rosales Flores', 'rosales_carina@creatica.com', '129951', 'user86', 'OGWNHRB'),
('Carlos Jose', 'Rosas Bonifaz', 'rosas_carlos@creatica.com', '210809', 'user87', 'UZPIAPN'),
('Aida Cristina', 'Ruiz De Castilla Britto', 'ruiz_aida@creatica.com', '210249', 'user88', 'FKQVFTF'),
('Celin', 'Salcedo Del Pino', 'salcedo_celin@creatica.com', '141311', 'user89', 'ZJWMJGT'),
('Efraín ', 'Arroyo Ramírez', 'arroyo_efrain@creatica.com', '192951', 'user9', 'KOJEWMY'),
('Violeta Marilu', 'Salinas Puccio', 'salinas_violeta@creatica.com', '203058', 'user90', 'EIPRPHV'),
('Augusto', 'Sanchez Arone', 'sanchez_augusto@creatica.com', '132210', 'user91', 'JBSICNI'),
('Pedro Manuel', 'Santa Cruz Benssa', 'santa_pedro@creatica.com', '128979', 'user92', 'XBHKXPM'),
('Angel', 'Solano Vargas', 'solano_angel@creatica.com', '152399', 'user93', 'JDCMZHR'),
('Jose Alberto', 'Tejedo Luna', 'tejedo_jose@creatica.com', '152279', 'user94', 'XUBCANE'),
('Angel ', 'Tenorio Davila', 'tenorio_angel@creatica.com', '114089', 'user95', 'BMAUKRQ'),
('Miguel Angel ', 'Torres Gaspar', 'torres_miguel@creatica.com', '205825', 'user96', 'YJQZIVU'),
('Jacquelin', 'Trujillo Parodi', 'trujillo_jacquelin@creatica.com', '151967', 'user97', 'UZKENAE'),
('Ruth Noricila', 'Vega Carreazo', 'vega_ruth@creatica.com', '163206', 'user98', 'TZWJCKZ'),
('Guillermo Jonathan', 'Velasquez Ramos', 'velasquez_guillermo@creatica.com', '187496', 'user99', 'ATHVCEW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ADMINISTRADOR`
--
ALTER TABLE `ADMINISTRADOR`
  ADD PRIMARY KEY (`Usuario`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `BOLETA`
--
ALTER TABLE `BOLETA`
  ADD PRIMARY KEY (`idBOLETA`);

--
-- Indices de la tabla `CURSO`
--
ALTER TABLE `CURSO`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ESTUDIANTE`
--
ALTER TABLE `ESTUDIANTE`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `HORARIO`
--
ALTER TABLE `HORARIO`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoCurso` (`codigoCurso`),
  ADD KEY `fk_HORARIO_1_idx` (`usuarioMaestro`);

--
-- Indices de la tabla `HORARIOSEMANA`
--
ALTER TABLE `HORARIOSEMANA`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `INSCRITO`
--
ALTER TABLE `INSCRITO`
  ADD KEY `codigoCurso` (`codigoCurso`),
  ADD KEY `fk_INSCRITO_1_idx` (`idBoleta`),
  ADD KEY `fk_INSCRITO_2_idx` (`codigoEstudiante`);

--
-- Indices de la tabla `MAESTRO`
--
ALTER TABLE `MAESTRO`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `PERFIL`
--
ALTER TABLE `PERFIL`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `correoElectronico_UNIQUE` (`correoElectronico`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ESTUDIANTE`
--
ALTER TABLE `ESTUDIANTE`
  ADD CONSTRAINT `fk_ESTUDIANTE_1` FOREIGN KEY (`usuario`) REFERENCES `PERFIL` (`usuario`);

--
-- Filtros para la tabla `HORARIO`
--
ALTER TABLE `HORARIO`
  ADD CONSTRAINT `HORARIO_ibfk_1` FOREIGN KEY (`codigoCurso`) REFERENCES `CURSO` (`codigo`),
  ADD CONSTRAINT `fk_HORARIO_1` FOREIGN KEY (`usuarioMaestro`) REFERENCES `MAESTRO` (`usuario`);

--
-- Filtros para la tabla `HORARIOSEMANA`
--
ALTER TABLE `HORARIOSEMANA`
  ADD CONSTRAINT `fk_HORARIOSEMANA_1` FOREIGN KEY (`codigo`) REFERENCES `HORARIO` (`codigo`);

--
-- Filtros para la tabla `INSCRITO`
--
ALTER TABLE `INSCRITO`
  ADD CONSTRAINT `INSCRITO_ibfk_1` FOREIGN KEY (`codigoCurso`) REFERENCES `HORARIO` (`codigo`),
  ADD CONSTRAINT `fk_INSCRITO_1` FOREIGN KEY (`idBoleta`) REFERENCES `BOLETA` (`idBOLETA`),
  ADD CONSTRAINT `fk_INSCRITO_2` FOREIGN KEY (`codigoEstudiante`) REFERENCES `ESTUDIANTE` (`usuario`);

--
-- Filtros para la tabla `MAESTRO`
--
ALTER TABLE `MAESTRO`
  ADD CONSTRAINT `fk_MAESTRO_1` FOREIGN KEY (`usuario`) REFERENCES `PERFIL` (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
