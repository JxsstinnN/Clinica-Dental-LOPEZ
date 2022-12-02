-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 17:13:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_CITA` int(3) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Notas` varchar(150) NOT NULL,
  `Mensaje` varchar(150) NOT NULL,
  `Fecha_Cita` datetime NOT NULL,
  `ID_Paciente` int(3) NOT NULL,
  `ID_Medico` int(3) NOT NULL,
  `User_ID` int(3) NOT NULL,
  `Costo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_Medico` int(3) NOT NULL,
  `Especialidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `ID_Medico` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Cedula` varchar(13) NOT NULL,
  `Genero` varchar(10) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Creado_A` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`ID_Medico`, `Nombre`, `Apellido`, `Cedula`, `Genero`, `Fecha_Nacimiento`, `Direccion`, `Telefono`, `Creado_A`) VALUES
(1, 'caco e ñema', 'Pablo', '402-0985688-5', 'F', '2022-08-11', 'lo santo', '809-666-6666', '2022-11-15 12:53:20'),
(2, 'MANUEL', 'ALCANTARA', '402-0985688-5', 'F', '2003-08-04', 'MIRAFLORES', '809-219-6139', '2022-11-15 13:28:52'),
(3, 'MANUEL', 'ALCANTARA', '402-0985688-5', 'F', '2003-08-04', 'MIRAFLORES', '809-219-6139', '2022-11-15 14:08:25'),
(4, 'MANUEL', 'ALCANTARA', '402-0985688-5', 'F', '2003-08-04', 'MIRAFLORES', '809-219-6139', '2022-11-16 12:41:24'),
(5, 'Arabelle', 'Smallpeice', '291-6991697-0', 'F', '2021-12-25', 'Harjavalta', '809-855-9980', '2022-11-24 13:59:21'),
(6, 'Adolph', 'Botfield', '054-6267948-9', 'M', '2022-05-25', 'Santa Cruz', '809-059-5079', '2022-11-24 13:59:21'),
(7, 'Quint', 'Breach', '292-2173870-5', 'M', '2022-08-19', 'Jinsha', '809-146-5739', '2022-11-24 13:59:21'),
(8, 'Elwyn', 'Stapley', '874-2403564-7', 'M', '2022-03-06', 'Diyarb Najm', '809-295-2032', '2022-11-24 13:59:21'),
(9, 'Lilia', 'Grolmann', '734-3548170-3', 'F', '2021-12-18', 'Jiujie', '809-008-8794', '2022-11-24 13:59:21'),
(10, 'Rupert', 'Castagno', '138-0587390-6', 'M', '2022-05-02', 'Baopukang', '809-061-1441', '2022-11-24 13:59:21'),
(11, 'Saidee', 'Reekie', '768-2725433-8', 'F', '2022-04-29', 'Tras Cerros', '809-451-4732', '2022-11-24 13:59:21'),
(12, 'Charlena', 'Johann', '309-5637864-5', 'F', '2022-01-06', 'Cibenda', '809-015-8286', '2022-11-24 13:59:21'),
(13, 'Pinchas', 'Simoni', '959-9311387-0', 'M', '2022-04-19', 'Xiangshan', '809-474-6037', '2022-11-24 13:59:21'),
(14, 'Antonio', 'Dublin', '244-7471732-4', 'M', '2022-08-13', 'Guanfang', '809-813-8340', '2022-11-24 13:59:21'),
(15, 'Merola', 'Waterland', '174-2442760-7', 'F', '2022-01-28', 'Srem?ica', '809-025-0487', '2022-11-24 13:59:21'),
(16, 'Glynis', 'Postin', '784-9679821-3', 'F', '2021-12-26', 'Guiping', '809-233-5219', '2022-11-24 13:59:21'),
(17, 'Keenan', 'Otterwell', '966-7781134-4', 'M', '2022-08-03', 'Podivín', '809-357-6048', '2022-11-24 13:59:21'),
(18, 'Lindsey', 'Lernihan', '540-7066925-8', 'M', '2022-02-17', 'Guicheng', '809-330-9941', '2022-11-24 13:59:21'),
(19, 'Thaddeus', 'Baggallay', '943-4775630-7', 'M', '2022-02-02', 'Bandong', '809-117-4813', '2022-11-24 13:59:21'),
(20, 'Morris', 'Iacofo', '552-3993570-9', 'M', '2022-09-11', 'Oguta', '809-887-2497', '2022-11-24 13:59:21'),
(21, 'Joete', 'Fraschini', '723-3973538-5', 'F', '2022-09-21', 'Resplendor', '809-109-3601', '2022-11-24 13:59:21'),
(22, 'Keefer', 'Halversen', '012-2987650-6', 'M', '2022-01-24', 'Pubal', '809-703-0194', '2022-11-24 13:59:21'),
(23, 'Denise', 'Kupke', '627-7715058-8', 'F', '2022-01-21', 'Tambong', '809-820-1023', '2022-11-24 13:59:22'),
(24, 'Ryon', 'Hardstaff', '425-7227976-1', 'M', '2022-06-28', 'Spassk-Dal’niy', '809-993-3084', '2022-11-24 13:59:22'),
(25, 'Louie', 'Gounod', '667-4027779-3', 'M', '2022-01-04', 'Rashaant', '809-402-1944', '2022-11-24 13:59:22'),
(26, 'Hank', 'Titchen', '150-1997228-0', 'M', '2022-06-18', 'Duntou', '809-340-0239', '2022-11-24 13:59:22'),
(27, 'Bordie', 'Paty', '057-9935062-6', 'M', '2022-07-30', 'Hongyi', '809-829-4961', '2022-11-24 13:59:22'),
(28, 'Ricki', 'Takis', '524-1591103-9', 'F', '2022-02-08', 'Armação de Búzios', '809-405-5098', '2022-11-24 13:59:22'),
(29, 'Kessiah', 'Scourfield', '374-3917622-0', 'F', '2022-10-27', 'Ambulong', '809-279-0171', '2022-11-24 13:59:22'),
(30, 'Batholomew', 'Rauprich', '023-7469470-9', 'M', '2022-09-12', 'Farsta', '809-147-9623', '2022-11-24 13:59:22'),
(31, 'Henriette', 'Smitherman', '824-8352615-4', 'F', '2022-07-31', 'Hema', '809-738-3031', '2022-11-24 13:59:22'),
(32, 'Joleen', 'Malkie', '612-9799548-1', 'F', '2022-03-17', 'Cluses', '809-224-0385', '2022-11-24 13:59:22'),
(33, 'Jane', 'Gier', '278-2589900-8', 'F', '2022-03-19', 'Sever do Vouga', '809-266-9439', '2022-11-24 13:59:22'),
(34, 'Eduino', 'Ewbanck', '197-4141027-2', 'M', '2022-04-15', 'Starychi', '809-819-3699', '2022-11-24 13:59:22'),
(35, 'Alaster', 'Aim', '697-0502704-5', 'M', '2022-03-08', 'Boulsa', '809-434-1294', '2022-11-24 13:59:22'),
(36, 'Joelly', 'Grece', '483-7460074-1', 'F', '2022-08-31', 'Tianya', '809-489-3290', '2022-11-24 13:59:22'),
(37, 'Rafaelia', 'Toothill', '727-1473225-6', 'F', '2022-03-24', 'Vyzhnytsya', '809-844-3034', '2022-11-24 13:59:22'),
(38, 'Willie', 'Doncom', '434-0353615-9', 'F', '2022-11-01', 'Bedadung Kulon', '809-090-8808', '2022-11-24 13:59:22'),
(39, 'Mikaela', 'Branwhite', '532-9880137-5', 'F', '2022-03-10', 'Autun', '809-210-1667', '2022-11-24 13:59:22'),
(40, 'Lian', 'Wilfinger', '260-0696197-8', 'F', '2022-07-25', 'Siluko', '809-185-5683', '2022-11-24 13:59:22'),
(41, 'Lydie', 'Leece', '793-3302612-1', 'F', '2022-05-03', 'Trojanów', '809-577-6490', '2022-11-24 13:59:22'),
(42, 'Audi', 'Scholz', '103-1666276-1', 'F', '2022-02-02', 'Si Narong', '809-373-4885', '2022-11-24 13:59:22'),
(43, 'Shandee', 'Softley', '870-3954067-8', 'F', '2022-11-15', 'Emiliano Zapata', '809-221-3645', '2022-11-24 13:59:22'),
(44, 'Stacie', 'Rubinovitsch', '428-5676486-4', 'F', '2022-06-03', 'Yeysk', '809-582-8329', '2022-11-24 13:59:22'),
(45, 'Laurella', 'Aulsford', '965-1748180-0', 'F', '2021-12-17', 'Ris?lpur', '809-396-2349', '2022-11-24 13:59:22'),
(46, 'Onida', 'Casterot', '283-3745173-3', 'F', '2022-07-15', 'Kostrzyn nad Odr?', '809-198-1390', '2022-11-24 13:59:22'),
(47, 'Tiffanie', 'Simone', '252-9589667-2', 'F', '2022-11-06', 'Oroin Xibe', '809-338-1752', '2022-11-24 13:59:23'),
(48, 'Valencia', 'Carlet', '785-8918229-6', 'F', '2022-03-05', 'Kedungkrajan', '809-131-4205', '2022-11-24 13:59:23'),
(49, 'Sandye', 'Samper', '909-7556287-9', 'F', '2022-10-27', 'Novi Vinodolski', '809-563-2195', '2022-11-24 13:59:23'),
(50, 'Donn', 'Bloodworth', '471-1290122-3', 'M', '2021-12-25', 'Cibunar', '809-542-5438', '2022-11-24 13:59:23'),
(51, 'Nelson', 'Spriggen', '373-5424985-9', 'M', '2022-06-01', 'Oju', '809-033-1148', '2022-11-24 13:59:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID_Paciente` int(3) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Genero` varchar(1) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Alergias` varchar(30) NOT NULL,
  `Creado_En` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`ID_Paciente`, `Cedula`, `Nombre`, `Apellido`, `Genero`, `Fecha_Nac`, `Direccion`, `Telefono`, `Alergias`, `Creado_En`) VALUES
(2, '402-0985688-5', 'bobombribibom', 'MALTINEZ PEREZ', 'F', '0000-00-00', 'LOS MIRAFLORES', '809-219-6139', 'Aspirina', '2022-11-21 13:01:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `User_ID` int(3) NOT NULL,
  `Nombre_usuario` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Fecha_Creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Tipo_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`User_ID`, `Nombre_usuario`, `password`, `Fecha_Creado`, `Tipo_usuario`) VALUES
(2, 'inoa', '$2y$10$SUVj7kx/HJFhy462eyr2X.L5b55iiF.5/5.BdluE67mzvrqtny5n6', '2022-11-10 15:03:45', 'Secretaria'),
(6, 'armando', '$2y$10$XAQ7RaXMunBnU2.YbAr.suQKADbHMRqYSaOtxVEdiXEcDzSJNiw02', '2022-11-15 13:36:44', 'secre'),
(7, 'JUSTIN', '$2y$10$jmHW/u/EVkHs.7rcNLXWZ.vAaEQjGLeQboXEutGI/haX2wvxnYVta', '2022-11-15 13:38:41', 'DOC'),
(8, 'ODY', '$2y$10$JAy.yFkyjWmllx22P5qZNe6DLbTN549q4MLS.IHiO8jwaCd7gktHe', '2022-11-24 15:23:32', 'ADMIN'),
(9, 'CRITIAN', '$2y$10$GbITqnZPdHYmSAY3rwlpgeUBzDlrhD9PkA3kayoOhH/.N1MYbT7sW', '2022-11-24 16:05:33', 'SECRE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_CITA`),
  ADD KEY `ID_Paciente` (`ID_Paciente`,`ID_Medico`,`User_ID`),
  ADD KEY `ID_Medico` (`ID_Medico`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD KEY `ID_Medico` (`ID_Medico`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID_Medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID_Paciente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_CITA` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_Medico` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `ID_Medico` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID_Paciente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `User_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `usuario` (`User_ID`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `especialidad_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medico` (`ID_Medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
