-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql.railway.internal
-- Tiempo de generación: 16-09-2025 a las 13:53:38
-- Versión del servidor: 9.3.0
-- Versión de PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `railway`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion_compras`
--

CREATE TABLE `administracion_compras` (
  `id` int NOT NULL,
  `objeto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_proceso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `proveedor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_compra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion_compras`
--

INSERT INTO `administracion_compras` (`id`, `objeto`, `monto`, `tipo_proceso`, `proveedor`, `estado`, `tipo_compra`) VALUES
(1, 'BIDONES DE AGUA', '$ 19.500.000,00', 'CONCURSO - CONCENTRA', '', 'P/APERTURA 05/03/25-10HS - SECRETARIA DE COMPRAS DE ABASTECIMIENTO', 'USC'),
(2, 'COMBUSTIBLE', '$ 36.750.000,00', 'CONCURSO - CONCENTRA', '', 'P/APERTURA 05/03/25-10HS - SECRETARIA DE COMPRAS DE ABASTECIMIENTO', 'USC'),
(3, 'SERVICIO DE VIGILANCIA / SEGURIDAD', '$ 343.508.000,00', 'CONCURSO- NO CONCENTRA', 'ACEVEDO JUAN CARLOS/MORENO MANUEL/SORIA TOMAS MATEO', 'ADJUDICADO', 'USC'),
(4, 'SERVICIO DE CATERING RESIDENCIA-150 DIAS CORRIDOS - - DESDE EL 13/3/25 AL  09/08/25', '$ 101.987.250,00', 'CONCURSO- NO CONCENTRA', 'DIAZ MAXIMILIANO', 'ADJUDICADO: DIAZ MAXIMILIANO - \n1°SERVICIO - DEL 13/3/25 AL  11/04/25 - 11/06/25 - PAGADO\n2°SERVICIO DEL 12/04/25 AL  11/05/25 -  04/08/25-PASE A DGPR#MHOP-REGISTRO_BENEFICIARIOS PARA CONTINUIDAD\n3°SERVICIO - DEL 12/05/25 AL 10/06/25: 04/08/25-PASE A DGPR', 'USC'),
(5, 'PRORROGA SERVICIO DE CATERING RESIDENCIA  - 150 DIAS CORRIDOS - DESDE EL 10/8/25 AL  06/01/26', '$ 124.424.445,00', 'PRORROGA DE CONCURSO DE PRECIOS- DESDE EL 10/8/25 AL  06/01/26', 'DIAZ MAXIMILIANO', 'ADJUDICADO: DIAZ MAXIMILIANO - CON OCA DE PRORROGA NOTIFICADO 25-7/25\n1°SERVICIO - DEL 10/8/25 AL  08/08/25', 'USC'),
(6, 'SERVICIO DE LIMPIEZA DE TANQUES Y DESINFECCION', '$ 41.495.686,00', 'CONCURSO- NO CONCENTRA', 'Claudio Rodolfo Ubaid/Patricio Gabriel del Campo/Jorge Luis Vildoza', 'ADJUDICADO', 'USC'),
(7, 'SERVICIO DE TRANSPORTE', '$ 46.500.000,00', 'CONCURSO- NO CONCENTRA', 'TRANS-MUTQUIN SRL', 'ADJUDICADO 08/3/25: ULTIMO PAGO DE CONTRATO ORIGINAL 06/09 - A DTES#ME PARA PAgo periodo hasta 07/07/25', 'USC'),
(8, 'PRÓRROGA - DESDE 24/04/25 AL 08/08/25  - CONTRATO DE LOCACIÓN POR SERVICIO DE GUARDA DE EXPEDIENTES LEGAJOS Y DOCUMENTACIÓN DE DPA-INET Y JUNTA DE CLASIFICACION- TRAMITADA RESICION DEL CONTRATO AL 08/08/25 - TRAMITACION CONTRATACION NUEVA PARA INCLUIR LA ', '$ 16.253.334,00', 'PRORROGA DE CONCURSO DE PRECIOS', 'P&G SERVICIOS S.R.L.', 'ADJUDICADO: P&G SERVICIOS SRL - INTERFILE\n                1° PERIODO 240425 AL 230525 -PAGADO- 10/06/2025\n2° PERIODO 240525 AL 230625 - PAGADO- 08/08/2025-TRAMITADO EN OTRO EXPTE: 2025-01531012- -CAT-DPA#MECYT\n3° PERIODO 240625 AL 230725 - PAGADO- 08/08/2', 'USC'),
(9, 'SERVICIO DE VIGILANCIA/ SEGURIDAD (PARA DESIERTOS)', '$ 164.332.000,00', 'CONCURSO- NO CONCENTRA', 'MURES SRL', 'TRAMITACION PAGO 1/4 - P/ CONTROL DE DOCUMENTACION DE PAGO POR Destinatario: Paola Indiana Bulacios', 'USC'),
(10, 'Alquiler de Inmueble para el funcionamiento de Escuela N° 999 - El Abra y Los Altos', '$ 8.280.000,00', 'CONCURSO- NO CONCENTRA', '', 'A LA ESPERA DE DIRECTIVAS PARA DAR CONTINUIDAD AL TRAMITE- 24/7/25  - CON DICTAMEN LEGAL PREVIO A DISPOSICION DE AUTORIZACION DE LLAMADO-APROBACION DE PLIEGO-FECHA DE APERTURA-DESIGNACION DE INTEGRANTES DE COMISION EVALUADORA', 'USC'),
(11, 'CONTRATACION PARA EL USO DEL SISTEMA SIU GUARADI Y SIU KOLLA', '$ 44.000.000,00', 'CONTRATACION DIRECTA INTERADMINISTRATIVA', 'CIN', 'CON RESOLUCION DE ADJUDICACION- CONFECCIONANDO CONTRATO', 'USC'),
(12, 'ALQUILER INMUEBLE PARQUE AUTOMOTOR', '$ 18.000.000,00', 'CONCURSO- NO CONCENTRA', '', 'A LA ESPERA DE DIRECTIVAS PARA DAR CONTINUIDAD AL TRAMITE- 17/7/25  - CON DICTAMEN LEGAL PREVIO A DISPOSICION DE AUTORIZACION DE LLAMADO-APROBACION DE PLIEGO-FECHA DE APERTURA-DESIGNACION DE INTEGRANTES DE COMISION EVALUADORA', 'USC'),
(13, 'ALQUILER INMUEBLE DEPOSITO', '$ 31.200.000,00', 'CONCURSO- NO CONCENTRA', '', 'A LA ESPERA DE DIRECTIVAS PARA DAR CONTINUIDAD AL TRAMITE- 15/7/25  - CON DICTAMEN LEGAL PREVIO A DISPOSICION DE AUTORIZACION DE LLAMADO-APROBACION DE PLIEGO-FECHA DE APERTURA-DESIGNACION DE INTEGRANTES DE COMISION EVALUADORA', 'USC'),
(14, 'PRÓRROGA - PAGOS DESDE 24/05/25 AL 08/08/25  - CONTRATO DE LOCACIÓN POR SERVICIO DE GUARDA DE EXPEDIENTES LEGAJOS Y DOCUMENTACIÓN DE DPA-INET Y JUNTA DE CLASIFICACION- ', '$ 11.653.334,00', 'CONTINUIDAD PRORROGA DE CONCURSO DE PRECIOS', 'P&G SERVICIOS S.R.L.', '2° PERIODO 240525 AL 230625 - PAGADO- 08/08/2025\n3° PERIODO 240625 AL 230725 - PAGADO- 08/08/2025\n4° PERIODO 240725 AL 080825 - 29/8/25- A LA ESPERA DE ENVIO DE FACTURA', 'USC'),
(15, 'SERVICIO DE GUARDA DE EXPEDIENTES LEGAJOS Y DOCUMENTACIÓN DEL MECYT', '$ 209.100.000,00', 'CONCURSO DE PRECIOS', 'P&G SERVICIOS S.R.L.', 'PARA FIRMA DE DICTAMEN POR COMISION EVALUADORA Y  A LA ESPERA DE CREDITO - 27/08/25 - APERTURA 26/8/25', 'USC'),
(16, 'CONTRATACION DE SERVICIO DE CONECTIVIDAD A INTERNET SATELITAL\nDE BAJA ORBITA PARA ESTABLECIMIENTOS ESCOLARES PROVINCIALES\nDEPENDIENTES DEL MINISTERIO DE EDUCACIÓN, CIENCIA Y\nTECNOLOGIA, SEGÚN ANEXO I POR EL TÉRMINO DE DOCE (12) MESES\nCON OPCION A PRORROGA', '$ 635.823.540,00', 'CONCURSO DE PRECIOS', 'TELECENTRO SA', 'PASE A PEDEMONTE P/ INFORME DE CALIDAD 29/8/25', 'USC'),
(17, 'PRORROGA SERVICIO DE SEGURIDAD POR 30 DIAS MURES EX-2025-00564902-   -CAT-DPADM#ME ', '$ 42.306.000,00', 'PRORROGA', 'MURES SRL', 'ENVIAR A CGP PARA CONTROL', 'USC'),
(18, 'SERVICIO DE TRANSPORTE - EX- MADRE 387922', '$ 46.500.000,00', 'PRORROGA', 'TRANS MUTQUIN SRL', 'CON INFORME DE CONTADURIA SOBRE TRAMITACION PRORROGA -PASA A CARLA OGAS - 28/8/25', 'USC'),
(19, 'BIDONES DE AGUA', '$ 19.500.000,00', 'CONTRATACION DIRECTA', 'CHIFLON S.A. (IVESS)', 'ADJUDICADO', 'SCA'),
(20, 'COMBUSTIBLE', '$ 36.750.000,00', 'CONTRATACION DIRECTA', 'J&M SRL (AXION)', 'PARA PAGO CONTABLE - EX-2025-00640233- -CAT-DPADM#ME (PAGO)', 'SCA'),
(21, 'COMBUSTIBLE', '$ 44.164.000,00', 'CONCURSO ', 'EL JUMEAL SRL Y AUTOGAS SRL', 'CON EX DE PAGO - EX-2025-01556648- -CAT-DPA#MECYT (EL JUMEAL) - EX-2025-01556674- -CAT-DPA#MECYT (AUTOGAS)', 'SCA'),
(22, 'SERVICIO DE ALMACENAMIENTO', '$ 1.200.000,00', 'FRI GENERAL', 'SEVERINI ANDREA', 'GUARDA TEMPORAL POR ERROR EN PRESUPUESTO', 'FRI'),
(23, 'SERVICIO DE ALMACENAMIENTO', '$ 1.900.000,00', 'FRI GENERAL', 'SEVERINI ANDREA', 'TESORERIA', 'FRI'),
(24, 'SERVICIO DE ALMACENAMIENTO', '$ 1.200.000,00', 'FRI GENERAL', 'SEVERINI ANDREA', 'TESORERIA', 'FRI'),
(25, 'SERVICIO DE MANTENIMIENTO Y REPARACION EDILICIA', '$ 13.000.001,35', 'FRI GENERAL', 'CARENA CONSTRUCCIONES SRL', 'PASE A DPADM#ME-TESORERIA_MIG', 'FRI'),
(26, 'CARGA DE GAS', '$ 1.917.000,00', 'FRI GENERAL', 'GUILHEBE SRL', 'PARA FIRMA SECRETACIO C. I. ', 'FRI'),
(27, 'SERVICIO DE IMPRESIÓN ', '$ 5.000.000,00', 'FRI GENERAL', 'INGENIO GRAFICA DE ALSINA ', 'PARA FIRMA SECRETACIO C. I. ', 'FRI'),
(28, 'UTILES DE ESCRITORIO Y OFICINA', '$ 18.065.700,00', 'FRI GENERAL', 'PAUL OLMEDO', 'PENDIENTE', 'FRI'),
(29, 'UTILES DE ESCRITORIO Y OFICINA', '$ 9.303.609,00', 'FRI GENERAL', 'KOTLER - PAK DISTRIBUCIONES', 'PENDIENTE', 'FRI'),
(30, 'SERVICIO DE LIMPIEZA', '$ 2.373.000,00', 'FRI GENERAL', 'F Y H DE LA PUNA', 'TESORERIA', 'FRI'),
(31, 'MATERIALES ELECTRICOS', '$ 17.926.750,00', 'FRI GENERAL', 'LOPEZ SILVANA NELLY', 'TESORERIA', 'FRI'),
(32, 'SERVICIO DE LIMPIEZA', '$ 3.050.500,00', 'FRI MANTENIMIENTO', 'ULTRA - DAIANA CORONEL', 'TESORERIA', 'FRI'),
(33, 'PRODUCTOS DE VIDRIO', '$ 5.000.000,00', 'FRI GENERAL', 'LOSSO MERCADO MARIA', 'TESORERIA', 'FRI'),
(34, 'ALIMENTOS PARA PERSONAS', '$ 480.000,00', 'FRI GENERAL', 'MORENO', 'TESORERIA', 'FRI'),
(35, 'UTILES DE ESCRITORIO', '$ 7.262.500,00', 'FRI GENERAL', 'ANA ISABEL REYNOSO', 'TESORERIA', 'FRI'),
(36, 'SERVICIO DE CUSTODIA DE BS Y VALORES', '$ 2.254.000,00', 'FRI GENERAL', 'SORIA TOMAS MATEO', 'TESORERIA', 'FRI'),
(37, 'SERVICIO DE CUSTODIA DE BS Y VALORES', '$ 1.309.356,00', 'FRI GENERAL', 'MORENO MANUEL LEONIDAS', 'TESORERIA', 'FRI'),
(38, 'SERVICIO DE CUSTODIA DE BS Y VALORES', '$ 3.502.764,00', 'FRI GENERAL', 'ACEVEDO JUAN CARLOS', 'TESORERIA', 'FRI'),
(39, 'ELEMENTOS DE LIMPIEZA', '$ 18.210.500,00', 'FRI GENERAL', ' LOPEZ SILVANA NELLY', 'TESORERIA', 'FRI'),
(40, 'PRODUCTOS FERROSOS Y OTROS NEP', '$ 2.409.800,00', 'FRI MANTENIMIENTO', ' RICARDO PREVEDELLO', 'TESORERIA', 'FRI'),
(41, 'COMBUSTIBLE', '$ 10.000.096,00', 'FRI GENERAL', ' YPF EL JUMEAL', 'TESORERIA', 'FRI'),
(42, 'SERVICIO DE TRASLADO Y ALOJAMIENTO', '$ 8.850.000,00', 'FRI GENERAL', ' EL JUMEAL VIAJES', 'TESORERIA', 'FRI'),
(43, 'PRODUCTOS DE LOZA Y OTROS NEP', '$ 9.582.590,80', 'FRI MANTENIMIENTO', 'LA CASA DEL INSTALADOR', 'TESORERIA', 'FRI'),
(44, 'SERVICIO DE LIMPIEZA', '$ 6.079.900,86', 'FRI MANTENIMIENTO', 'AVELLANEDA DEBORA', 'TESORERIA', 'FRI'),
(45, 'SEGURO DE VEHICULOS', '$ 5.252.316,00', 'FRI GENERAL', 'TRIUNFO SEGUROS', 'TESORERIA', 'FRI'),
(46, 'SEGURO DE VEHICULOS', '$ 260.723,00', 'FRI GENERAL', 'TRIUNFO SEGUROS', 'TESORERIA', 'FRI'),
(47, 'ALIMENTOS PARA PERSONAS', '$ 15.007.500,00', 'FRI GENERAL', 'WAISMAN', 'TESORERIA', 'FRI'),
(48, 'UTILES  DE ESCRITORIO', '$ 25.285.000,00', 'FRI GENERAL', 'ZAPATA JOSE EDUARDO', 'TESORERIA', 'FRI'),
(49, 'TINTAS, PINTURAS Y COLORANTES', '$ 7.916.470,42', 'FRI MANTENIMIENTO', 'LA PINTURERIA', 'TESORERIA', 'FRI'),
(50, '', '$ 19.840.000,00', 'FRI MANTENIMIENTO', 'CICIOLI', 'TESORERIA', 'FRI'),
(51, '', '$ 5.005.400,00', 'FRI MANTENIMIENTO', 'OS FRAN', 'TESORERIA', 'FRI'),
(52, '', '$ 3.000.000,00', 'FRI MANTENIMIENTO', 'ALTA TENSION', 'TESORERIA', 'FRI'),
(53, '', '$ 1.400.000,00', 'FRI GENERAL', 'MEDRANO MIGUEL', 'TESORERIA', 'FRI'),
(54, 'SERVICIO ESPECIALIZADO. FORTALECIMIENTO INSTITUCIONAL: ', '$ 2.415.324,00', 'FRI GENERAL', 'TALBOT', 'TESORERIA', 'FRI'),
(55, 'SERVICIO ESPECIALIZADO. FORTALECIMIENTO INSTITUCIONAL: ', '$ 2.415.324,00', 'FRI GENERAL', 'COLOMBO', 'TESORERIA', 'FRI'),
(56, 'SERVICIO ESPECIALIZADO. FORTALECIMIENTO INSTITUCIONAL: ', '$ 2.415.324,00', 'FRI GENERAL', 'AISA', 'TESORERIA', 'FRI'),
(57, 'ADQ. DE UTENSILIOS DE COCINA', '$ 1.869.650,00', 'FRI GENERAL', 'ARROSAS', 'TESORERIA', 'FRI'),
(58, '', '$ 3.260.000,00', 'FRI GENERAL', 'GUILHEBE SRL', 'TESORERIA', 'FRI'),
(59, '', '$ 11.331.500,00', 'FRI GENERAL', 'INGENIO GRAFICA DE ALSINA ', 'FACTURADO', 'FRI'),
(60, '', '$ 2.300.000,00', 'FRI MANTENIMIENTO', 'AREVALO DANTE GREGORIO', 'FACTURADO SIN CREDITO', 'FRI'),
(61, '', '$ 1.502.946,82', 'FRI MANTENIMIENTO', 'LA FERRETERIA', 'TESORERIA', 'FRI'),
(62, 'MANTENIMIENTOS DE VEHICULOS OFICIALES', '$ 15.460.000,00', 'FRI GENERAL', 'ARIEL AGUERO', 'TESORERIA', 'FRI'),
(63, 'CATERING', '$ 4.750.000,00', 'FRI GENERAL', 'LOPEZ SILVANA NELLY', 'FACTURADO', 'FRI'),
(64, 'REPARACION DE SILLAS Y BANCOS', '$ 26.500.000,00', 'FRI MANTENIMIENTO', 'CLAUDIO TORREZ', 'NOTIFICADO', 'FRI'),
(65, 'SERVICIO DE TRASLADO DE PER.', '$ 9.000.000,00', 'FRI GENERAL', 'JUMEAL VIAJES', 'FACTURADO/PAGADO', 'FRI'),
(66, 'ADQUISICION DE MAT. ED. FISICA', '$ 21.889.710,00', 'FRI GENERAL', 'WAISMAN', 'TESORERIA', 'FRI'),
(67, 'SERVICIO DE LIMPIEZA', '$ 14.530.683,70', 'FRI MANTENIMIENTO', 'CORONEL DAIANA', 'TESORERIA', 'FRI'),
(68, 'SERV. INSTALACION DE GAS', '$ 3.000.000,00', 'FRI MANTENIMIENTO', 'BUSTAMANTE', 'TESORERIA', 'FRI'),
(69, 'SERVICIO DE LIMPIEZA', '$ 7.269.103,20', 'FRI MANTENIMIENTO', 'AVELLANEDA DEBORA', 'PARA FACTURAR', 'FRI'),
(70, 'SERVICIO DE LIMPIEZA', '$ 9.462.586,25', 'FRI MANTENIMIENTO', 'CORONEL DAIANA GISELLE', 'TESORERIA', 'FRI'),
(71, 'SERVICIO DE IMPRESIÓN', '$ 26.664.000,00', 'FRI GENERAL', 'WAISMAN GABRIEL', 'TESORERIA', 'FRI'),
(72, 'SERVICIO DE LIMPIEZA', '$ 4.650.000,00', 'FRI MANTENIMIENTO', 'AVELLANEDA DEBORA', 'TESORERIA', 'FRI'),
(73, 'SERVICIO DE LIMPIEZA', '$ 7.350.000,00', 'FRI MANTENIMIENTO', 'COOP. LA PIRCA', 'TESORERIA', 'FRI'),
(74, 'SERVICIO DE INSTALACIÓN, REPARACIÓN Y MANTENIMIENTO DE ARTEFACTOS DE GAS', '$ 510.000,00', 'FRI MANTENIMIENTO', 'BUSTAMANTE ANTONIO', 'TESORERIA', 'FRI'),
(75, 'ADQUISICIÓN DE TONER', '$ 7.150.000,00', 'FRI GENERAL', 'TORREZ CLAUDIO', 'TESORERIA', 'FRI'),
(76, 'SERVICIO DE DESMALEZADO', '$ 10.600.000,00', 'FRI MANTENIMIENTO', 'COOP. ENFRENTANDO OBSTACULOS', 'TESORERIA', 'FRI'),
(77, 'MANT. ESCUELA ACTIVA', '$ 25.563.500,00', 'FRI MANTENIMIENTO', 'COOP . LA PIRCA', 'FACTURADO', 'FRI'),
(78, 'ADQ DE MATERIALES ELECTRICOS', '$ 25.001.573,44', 'FRI MANTENIMIENTO', 'ZUAZQUITA OSVALDO ADRIAN', 'FACTURADO', 'FRI'),
(79, 'ADQ. DE MATERIALES VARIOS', '$ 37.028.045,00', 'FRI MANTENIMIENTO', 'MURES', 'FACTURADO', 'FRI'),
(80, 'SERV. LIMPIEZA', '$ 6.703.500,00', 'FRI MANTENIMIENTO', 'Daina Coronel', 'FACTURADO', 'FRI'),
(81, 'SERV. DE PINTURA ESC ACTIVA', '$ 52.955.000,00', 'FRI MANTENIMIENTO', 'COOP. LA PRICA', 'FACTURA EL 22/04/2025', 'FRI'),
(82, 'SERV. DE MONITOREO SALTELITAL', '$ 3.576.000,00', 'FRI GENERAL', 'KAHAN AGUSTIN', 'A LA ESPERA DE FACTURA', 'FRI'),
(83, 'SERV DE CATERING', '$ 3.150.000,00', 'FRI GENERAL', 'LOPEZ SILVANA NELLY', 'FACTURADO', 'FRI'),
(84, 'SERV DE CATERING', '$ 1.500.000,00', 'FRI GENERAL', 'LOPEZ SILVANA NELLY', 'FACTURADO', 'FRI'),
(85, 'SERV DE GUARDA DE VEHICULOS', '$ 1.900.000,00', 'FRI GENERAL', 'SEVERINI ANDREA', 'FACTURA EL 30/04/2025', 'FRI'),
(86, 'CONT. SEGUROS ACCIDENTES PERSONALES-RESPONSAB. CIVIL- R.U.', '$ 1.800.087,60', 'FRI GENERAL', 'Federación Patronal Seguros   S.A.U', 'EN TESORERIA', 'FRI'),
(87, 'ELEMENTOS DE LIMPIEZA', '$ 26.110.000,00', 'FRI GENERAL', 'BARRIONUEVO JESSICA', 'GUARDA TEMPORAL ', 'FRI'),
(88, 'PRODUCTOS DE VIDRIO', '$ 6.073.064,00', 'FRI MANTENIMIENTO', 'LOSSO MARIA CELESTE', 'TESORERIA', 'FRI'),
(89, 'PRODUCTOS DE MATERIAL PLASTICO Y OTROS NEP', '$ 2.348.969,00', 'FRI MANTENIMIENTO', 'LA CASA DEL INSTALADOR', 'TESORERIA', 'FRI'),
(90, 'SERVICIO DE DESMALEZADO, PODA DE ARBOLES Y PARQUIZACION', '$ 10.790.000,00', 'FRI MANTENIMIENTO', 'COOP. ENFRENTANDO OBSTACULOS', 'TESORERIA', 'FRI'),
(91, 'BOLSAS DE CONSORCIO', '$ 12.002.000,00', 'FRI GENERAL', 'ZAPATA DISTRIBUIDORA BETTYS', 'GUARDA TEMPORAL', 'FRI'),
(92, 'SERVICIO DE IMPRESIÓN', '$ 24.745.450,00', 'FRI GENERAL', 'ALSINA ALCOBERT', 'TESORERIA ', 'FRI'),
(93, 'MATERIALES VARIOS', '$ 15.105.600,00', 'FRI MANTENIMIENTO', 'BERNARDI', 'TESORERIA ', 'FRI'),
(94, 'MATERIALES ELECTRICOS', '$ 556.819,16', 'FRI MANTENIMIENTO', 'ALTA TENSION', 'TESORERIA ', 'FRI'),
(95, 'CEMENTO Y CAL', '$ 4.000.020,00', 'FRI MANTENIMIENTO', 'FERRETERIA OSFRAN', 'TESORERIA ', 'FRI'),
(96, 'TRASLADO Y HOSPEDAJE', '$ 4.000.000,00', 'FRI GENERAL', 'CALDERON SILVIA', 'TESORERIA ', 'FRI'),
(97, 'SERVICIO DE CATERING', '$ 1.800.000,00', 'FRI GENERAL', 'LOPEZ SILVANA NELLY', 'TESORERIA ', 'FRI'),
(98, 'ELEMENTOS DE LIMPIEZA', '$ 26.014.650,00', 'FRI GENERAL', 'BARRIONUEVO JESSICA', 'TESORERIA ', 'FRI'),
(99, 'DESMALEZAMIENTO Y  FUMIGACION', '$ 9.000.000,00', 'FRI MANTENIMIENTO', 'JOSE ORLANDO IMPERIAL', 'NOTIFICADO', 'FRI'),
(100, 'CEMENTO, CAL Y YESO', '$ 17.009.500,00', 'FRI MANTENIMIENTO', 'CARLOS CICIOLI', 'NOTIFICADO', 'FRI'),
(101, 'EVENTO JORNADA CONSTITUCIONAL', '', 'FRI GENERAL', 'SIN PROVEEDOR', '', 'FRI'),
(102, 'ADQ. DE PORTONES DE CHAPA', '$ 1.227.374,44', 'FRI MANTENIMIENTO', 'PICON MIGUEL', 'NOTIFICADO', 'FRI'),
(103, 'PRENDAS DE VESTIR', '$ 6.420.000,00', 'FRI GENERAL', 'ALCAIDE INDUMENTARIA', 'NOTIFICADO', 'FRI'),
(104, 'ADQ. PROD FERROSOS ETC', '$ 628.285,87', 'FRI MANTENIMIENTO', 'MI VIEJO CORRALON', 'TESORERIA', 'FRI'),
(105, 'HEERAMIENTAS MENORES', '$ 18.000.500,00', 'FRI MANTENIMIENTO', 'TORREZ CLAUDIO', 'PARA MODIFICAR', 'FRI'),
(106, 'JORNADA FINANCIERA', '$ 5.000.000,00', 'FRI GENERAL', 'REYNOSO ANA ISABEL', 'TESORERIA', 'FRI'),
(107, 'SERVICIO DE CATERING JORNADA FINANCIERA', '$ 3.000.000,00', 'FRI GENERAL', 'ALVAREZ EDGAR', 'TESORERIA', 'FRI'),
(108, 'TERMOTANQUES SOLARES', '$ 6.399.879,99', 'FRI GENERAL', 'BRACAMONTE  RAUL ALEJANDRO', 'TESORERIA', 'FRI'),
(109, 'TERMOTANQUES A GAS', '$ 820.000,00', 'FRI GENERAL', 'NAVARRO MARCOS EMANUEL', 'TESORERIA', 'FRI'),
(110, 'SILLAS ESCOLARES', '$ 34.500.000,00', 'FRI GENERAL', 'TORREZ CLAUDIO MARIANO', 'TESORERIA', 'FRI'),
(111, 'KIT DOCENTE', '$ 25.527.000,00', 'FRI GENERAL', 'VEGA WENDI', 'TESORERIA', 'FRI'),
(112, 'SERVICIO DE LIMPIEZA', '$ 10.645.298,07', 'FRI MANTENIMIENTO', 'CORONEL DAIANA GISELLE', 'PARA FACTURAR', 'FRI'),
(113, 'SERVICIO DE LIMPIEZA', '$ 4.091.206,30', 'FRI MANTENIMIENTO', 'AVELLANEDA DEBORA', 'PARA FACTURAR', 'FRI'),
(114, 'CARGAS DE GAS', '$ 3.260.000,00', 'FRI GENERAL', 'GUILHEBE SRL', 'TESORERIA', 'FRI'),
(115, 'SERVICIO DE SONIDO', '$ 3.500.000,00', 'FRI GENERAL', 'CARRIZO JOAQUIN LEANDRO', 'NOTIFICADO SP 102-', 'FRI'),
(116, 'ALQUILER DE DISFRACES', '$ 330.000,00', 'FRI GENERAL', 'RODRIGUEZ NICOLAS', 'esperando fecha del evento. Con SG', 'FRI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `id` int NOT NULL,
  `oferente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `denominacion_proyecto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_proyecto` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `modalidad` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `eje` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`id`, `oferente`, `denominacion_proyecto`, `tipo_proyecto`, `modalidad`, `eje`, `equipo`, `nivel`, `localidad`, `direccion`, `fecha_inicio`, `fecha_finalizacion`) VALUES
(1, 'Facultad de Humanidades-UNCa- Dpto Lenguas Extranjeras', 'VIII Jornadas Disciplinares en Lenguas Extranjeras “Inspiración e innovación: construyendo el futuro de la enseñanza de lenguas extranjeras”', 'Jornadas de actualización y perfeccionamiento docen', 'Presencial', 'Nuevas Herramientas Didácticas', 'Magister Guadalupe López Acuña, Magister Elizabeth', 'Inicial, Primario, Secundario y Superior', 'San Fernando del Valle de Catamarca', 'Facultad de Humanidades-UNCa', '2025-03-27', '2025-03-28'),
(2, 'Facultad de Humanidades-UNCa- Dpto Historia', 'X ENCUENTRO DE PROFESORES DE HISTORIA. PERSPECTIVAS DE LA HISTORIA EN EL CAMPO DE LA ENSEÑANZA Y LA INVESTIGACIÓN ANTE LOS DESAFÍOS DE LA ERA D', 'Jornadas', 'Presencial', 'PERSPECTIVAS DE LA HISTORIA EN EL CAMPO DE LA ENSEÑANZA Y LA INVESTIGACIÓN ANTE LOS DESAFÍOS DE LA E', 'Cesar Reartes- Dpto Historia', 'Nivel Secundario y Superior.', 'San Fernando del Valle de Catamarca', 'UNCA- Facultad de Humanidades', '2025-04-10', '2025-04-11'),
(3, 'Facultad de Humanidades- UNCA- Dpto Letras', 'VII jornadas Disciplinares de Letras', 'Jornadas', 'Presencial', 'Diálogos sobre lectura, escritura y oralidad.', 'Comisión Ejecutiva y Académica', 'Nivel Primario, Secundario y Superior', 'San Fernando del Valle de Catamarca', 'UNCA- Facultad de Humanidades', '2025-05-15', '2025-05-16'),
(4, 'UDA', 'Educación Inclusiva: transformando prácticas, construyendo futuro', 'Curso de actualización docente', 'Presencial', 'Educación Inclusiva', 'Morales Cecilia', 'Secundario', 'San Fernando del Valle de Catamarca', 'Sede Gremial de UDA (Sarmiento 1106, Ca', '2025-06-18', '2025-06-19'),
(5, 'SADOP', 'El desarrollo del pensamiento crítico a través de la IA', 'Curso', 'Virtual', 'Pensamiento crítico', 'Staff de SADOP/Capacitador Lic. Darío Rutti', 'Secundario y Superior', 'SIN ESPECIFICAR', 'SIN ESPECIFICAR', '2025-05-17', '2025-07-30'),
(6, 'ATECA', 'TECNOLOGIAS EMERGENTES PARA LA IMPLEMETACIÓN EN EL AULA” “INTELIGENCIA ARTIFICIAL Y CLOUD COMPUTING”   - II Tramo', 'Taller', 'Presencial', 'Educación digital', 'Tozzini Ana Karina/ Capacitadores Romero, Christian D', 'Nivel inicial, primario y secundario', 'San Fernando del Valle de Catamarca', 'Escuela Primaria N° 991', '2025-05-10', '2025-05-10'),
(7, 'ATECA', 'Programación y Robótica - II Tramo', 'Taller', 'Presencial', 'Educación digital', 'Tozzini Ana Karina/ Capacitadores Romero, Christian D', 'Nivel inicial, primario y secundario', 'Saujil-Pomán', 'Salón Municipal de Saujil', '2025-05-10', '2025-05-10'),
(8, 'SIDCA', 'I CONGRESO NACIONAL DE DERECHO EDUCATIVO', 'Congreso', 'Presencial-Virtu', 'Derecho Educativo', 'Sergio Guillamondegui', 'Inicial, Primario y Secundario', 'San Fernando del Valle de Catamarca', 'CineTeatro Catamarca-Plataforma virtual', '2025-05-08', '2025-05-18'),
(9, 'IES Tinogasta', 'Primeras Jornadas de intercambio docente y estudiantil de los IES de gestión estatal y privada de Catamarca:“Reflexiones sobre el campo de la práctica desde una mir', 'Jornada', 'Presencial', 'Práctica Docente', 'PROF. LUIS ARNALDO ÁVILA-LIC. YAEL QUINTAR.', 'Superior', 'Tinogasta', 'Auditorio Museo del Sabor-Tinogasta', '2025-05-16', '2025-05-16'),
(10, 'ATECA', 'Aprendizaje basado en Proyectos (ABP) II Tramo', 'Taller', 'Presencial', 'Nuevas Herramientas didácticas Metodologías activas', 'Tozzini Ana Karina', 'Inicial, Primario,Secundario', 'Belen', 'Polideportivo Municipal de Belén', '2025-05-17', '2025-05-17'),
(11, 'Comunidad Kakán Julumao Andalgalá', '“Teatro y Danza en la Educación desde una Perspectiva Intercultural Indígena”', 'Curso', 'Presencial', 'Lenguaje Artistico', 'Prof. María Luz Martinez', 'Inicial, Primario,Secundario', 'Andalgalá', 'Cine teatro Municipal Andalgalá Catamarc', '2025-06-12', '2025-06-14'),
(12, 'ATECA', '“EDUCACIÓN DISRUPTIVA: CAMINO DE METODOLOGÍAS ACTIVAS”', 'Curso', 'Virtual sincróni', 'Nuevas Herramientas didácticas', 'TOZZINI, ANA KARINA', 'Inicial, Primario y Secundario', 'SIN ESPECIFICAR', 'SIN ESPECIFICAR', '2025-05-19', '2025-06-11'),
(13, 'UDA', '1º JORNADAS CATAMARQUEÑAS DE ENSEÑANZA DE LA LECTURA: LA IMAGEN COMO TEXTO, ITINERARIOS LECTORES Y NUEVOS GÉNEROS DE LA LIJ EN LA ESCUELA P', 'Jornada', 'Presencial', 'Herramientas en la enseñanza de la lectura', 'María Elisa Argerich y Prof. Estela Urueña', 'Primario y Secundario', 'Santa María', 'Escuela Provincial de Educación Técnica N', '2025-05-30', '2025-05-31'),
(14, 'UDA', 'Taller Aprendizaje colaborativo sobre la no-violencia y sus formas socio-educativas', 'Taller', 'Presencial', 'Cuidado y Bienestar', 'Prof. Mayco Macías (capacitador) y equipo de seguim', 'Secundario', 'Capital y Tinogasta', 'Sede Gremial de UDA (Sarmiento 1106, Ca', '2025-06-07', '2025-06-24'),
(15, 'INSTITUTO TECNOLÓGICO MUNICIPAL', 'CREACIÓN DE MATERIALES EDUCATIVOS DIGITALES PARA EL AULA', 'Curso', 'Virtual', 'Educación Digital', 'Prof.; Endrizzi, Sergio Lic.: Campagnale, Rubén', 'Primario y Secundario', 'Plataforma Moodle SIDCA', 'SIN ESPECIFICAR', '2025-06-04', '2025-07-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int NOT NULL,
  `fecha` date NOT NULL,
  `establecimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tarea` text COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_tarea` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `fecha`, `establecimiento`, `tarea`, `tipo_tarea`) VALUES
(1, '2025-07-07', 'ESC.N°701 C.J.A.', 'TRABAJO DE PINTURA EN LAS AULAS.', 'APH'),
(2, '2025-07-07', 'ESC.ESP.N°998', 'REPARACION DE TANQUE DE RESERVA POR PERDIDA DE AGUA.', 'APH'),
(3, '2025-07-07', 'ESC.N°323 LA VIÑITA', 'SOLDADURA EN PUERTAS.', 'APH'),
(4, '2025-07-07', 'ESC.N°1 COLEGIO NACIONAL', 'REPARACION DE TANQUE DE RESERVA.', 'APH'),
(5, '2025-07-07', 'ESC.SEC.N°5 GALINDEZ', 'REPOSICION DE ARTEFACTOS SANITARIOS.', 'APH'),
(6, '2025-07-08', 'ESC.SEC.N°5 GALINDEZ', 'REPOSICION DE MOCHILA PARA INODORO Y VALVULA PARA DESCARGA.', 'APH'),
(7, '2025-07-08', 'ESC.ESP.N°998', 'CONSTRUCCION DE BASE PARA TANQUE DE RESERVA.', 'APH'),
(8, '2025-07-08', 'JIN 37 DE ESC.601', 'REPARACION EN SANITARIOS POR PERDIDA DE AGUA.', 'APH'),
(9, '2025-07-08', 'ESC.N°701 C.J.A.', 'PINTURA EN INTERIOR.', 'APH'),
(10, '2025-07-08', 'JIN 2 DE ESC.323 ANEXO 03', 'SOLDADURA DE JUEEGOS INFANTILES.', 'APH'),
(11, '2025-07-10', 'ESC.ACTIVA', 'REPARACION DE DEPOSITOS DE AGUA EN LOS ARTEFACTOS SANITARIOS.', 'APH'),
(12, '2025-07-10', 'JIN 37 DE ESC. 601', 'REPARACION DE PERDIDA DE AGUA EN SANITARIOS.', 'APH'),
(13, '2025-07-10', 'EVEA', 'REPARACION DE PUERTA BLINDEX.', 'APH'),
(14, '2025-07-10', 'ESC.SEC. N°47 SAN MARTIN CAPAYAN', 'RELEVAMIENTO.', 'APH'),
(15, '2025-07-10', 'ESC.N°701 C.J.A.', 'PINTURA  EN INTERIOR.', 'APH'),
(16, '2025-07-11', 'ESC.N°701 C.J.A.', 'PINTURA EN INTERIOR.', 'APH'),
(17, '2025-07-11', 'ESC.N°367 STA CRUZ V.V', 'REPARACIONES SANITARIAS EN GRAL.', 'APH'),
(18, '2025-07-11', 'ESC.ESP.N°998', 'CONSTRUCCION DE BASE PARA TANQUE DE RESERVA.', 'APH'),
(19, '2025-07-11', 'JIN 2 DE ESC.323 ANEXO 03', 'SOLDADURA DE LOS JUEGOS INFANTILES.', 'APH'),
(20, '2025-07-11', 'JIN 37 DE ESC. 601', 'INSTALACION DE AGUA CON REPOSICION DE CAÑERIA.', 'APH'),
(21, '2025-07-07', 'ESC.SEC.N°5 GALINDEZ', 'COLOCACION DE ARTEFACTOS Y LUMINARIA.', 'ELEC'),
(22, '2025-07-07', 'ESC.ESP.N°998', 'REPARACION DE BOMBA DE AGUA.', 'ELEC'),
(23, '2025-07-07', 'ESC.N°180', 'COLOCACION DE ARTEFACTOS Y TUBOS LED DE 18W.', 'ELEC'),
(24, '2025-07-07', 'ESC.N°122 AGUAS COLORADAS VALLE VIEJO', 'REPARACION DE CORTOCIRCUITO.', 'ELEC'),
(25, '2025-07-07', 'PABELLON 13', 'COLOCACION DE TOMACORRIENTES.', 'ELEC'),
(26, '2025-07-08', 'ESC.SEC.N°2 C.J.A.', 'COLOCACION DE LUMINARIAS.', 'ELEC'),
(27, '2025-07-08', 'ISEF', 'COLOCACION DE LUNINARIAS.', 'ELEC'),
(28, '2025-07-08', 'ESC.N°302 POLCOS', 'COLOCACION DE LLAVE TERMICA TETRAPOLAR Y TUBOS LED.', 'ELEC'),
(29, '2025-07-08', 'ES.N°180', 'COLOCACION DE TUBOS Y REFLECTOR.', 'ELEC'),
(30, '2025-07-10', 'ISEF POLIDEPORTIVO', 'COLOCACION DE LUMINARIAS.', 'ELEC'),
(31, '2025-07-10', 'ESC.N°180 PARQUE  AMERICA', 'COLOCACION DE LUMINARIAS.', 'ELEC'),
(32, '2025-07-10', 'ESC.SEC.N°49', 'REPARACION DE CORTOCIRCUITO.', 'ELEC'),
(33, '2025-07-10', 'ESC.N°126 APOLO', 'REPARACION DE CORTOCIRCUITO.', 'ELEC'),
(34, '2025-07-10', 'ESC.N°47 SAN MARTIN CAPAYAN', 'REPARACION DE TABLERO PRINCIPAL, CAMBIO DE LLAVE TERMICAS.', 'ELEC'),
(35, '2025-07-11', 'ISEF POLIDEPORTIVO', 'COLOCACION DE LUMINARIAS Y CALEFACTORES.', 'ELEC'),
(36, '2025-07-11', 'ESC.N°180 PARQUE  AMERICA', 'COLOCACION DE LUMINARIA Y CAMBIO DE CABLEADO.', 'ELEC'),
(37, '2025-07-11', 'ESC.SEC.N°2 C.J.A.', 'COLOCACION DE ARTEFACTOS DE ILUMINACION.', 'ELEC'),
(38, '2025-07-11', 'ESC.SEC.N°83 POZO EL MISTOL', 'REVISION DE BOMBA, FLOTANTE Y AUTOMATICO.', 'ELEC'),
(39, '2025-07-07', 'JIN 7 DE ESC. 182 ANEXO 07', 'DESMALEZAMIENTO', 'DEZM'),
(40, '2025-07-07', 'ESC.ESP N°34', 'DESMALEZAMIENTO', 'DEZM'),
(41, '2025-07-08', 'ESC.N°296 LA CHACARITA', 'DESMALEZAMIENTO', 'DEZM'),
(42, '2025-07-08', 'ESC. N°202 WILFRIDO ROJAS', 'DESMALEZAMIENTO', 'DEZM'),
(43, '2025-07-10', 'EDJA 29', 'DESMALEZAMIENTO', 'DEZM'),
(44, '2025-07-11', 'EDJA 29', 'DESMALEZAMIENTO', 'DEZM'),
(45, '2025-07-11', 'ESC.N°296 LA CHACARITA', 'DESMALEZAMIENTO', 'DEZM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_comisiones`
--

CREATE TABLE `mantenimiento_comisiones` (
  `id` int NOT NULL,
  `fecha` date NOT NULL,
  `establecimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `detalle_obra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `personas` int NOT NULL,
  `dias` int NOT NULL,
  `agentes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento_comisiones`
--

INSERT INTO `mantenimiento_comisiones` (`id`, `fecha`, `establecimiento`, `localidad`, `departamento`, `detalle_obra`, `personas`, `dias`, `agentes`, `estado`) VALUES
(1, '2025-02-13', '194, 142 y 116', 'La Angostura, El Peñon y Antofalla', 'Belén y Antofagasta de la Sierra', 'Esc. 194: Releva. De albergue. Esc. 142: Colocación de zépelin de gas y Esc. 116: Habilitación de jardín.', 2, 3, 'Arqui. Véliz Marcelo y Delgado Jorge', 'EJECUTADO'),
(2, '2025-02-17', '322', 'Cañada de Páez', 'Ancasti', 'Ejecución de acometida completa, cambio de tablero principal y secundario, cambio de llaves y tomas', 3, 3, 'Robledo Marcos, Seco Guillermo y Bonaterra Sebastian', 'EJECUTADO'),
(3, '2025-02-20', '194', 'La Angostura', 'Belén ', 'Entrega de equipamiento', 2, 2, 'Jorge Delgado y Roberto olmos', 'EJECUTADO'),
(4, '2025-02-25', '703', 'Ciudad', 'Santa María', 'Colocación de bomba de agua', 2, 1, 'Acosta José y Tula Daniel', 'EJECUTADO'),
(5, '2025-02-26', '292', 'La Merced', 'Paclín', 'Reparación de corto circuito y relevamiento de sanitarios', 4, 1, 'Robledo, Seco, Bonaterra y Soria', 'EJECUTADO'),
(6, '2025-02-27', 'Sec. N° 64 Y 88', 'Lavalle', 'Santa Rosa', 'reparación de corto circuito ', 2, 2, 'Acosta y Gómez', 'EJECUTADO'),
(7, '2025-03-06', 'Sec. N° 68', 'Medanitos', 'Tinogasta', 'Relevamiento de instal. Eléctrica y relevamiento general del edificio', 4, 2, 'Nancy, Robledo, Seco y Bonaterra', 'EJECUTADO'),
(8, '2025-04-11', 'Primaria N° 287 y JIN Y Esc. Sec. N° 27', 'Alto de las Juntas y El Alamito', 'Andalgalá-Aconquija', 'Relevamiento de los edificios escolares', 2, 1, 'Arqui Avellaneda  y Arqui Ferreira', 'EJECUTADO'),
(9, '2025-04-25', 'Sec. 57', 'Esquiú', 'La Paz', 'Reparación decorto circuito', 2, 1, 'Acosta José y Bonaterra', 'EJECUTADO'),
(10, '2025-04-24', '317', 'Cañada de Páez', 'Santa María', 'Recepción de obra', 1, 1, 'Arqu. Marcelo Espeche', 'EJECUTADO'),
(11, '2025-06-05', 'I.E.S.', 'Fiambalá', 'Tinogasta', 'Relevamiento del estado del edificio', 1, 1, 'Arqu. Marcelo Jurado', 'EJECUTADO'),
(12, '2025-06-10', 'Sec. N° 72', 'Chumbicha', 'Capayán', 'Relevamiento del estado del edificio', 2, 1, 'Avellaneda Nancy y Ferreira Hugo', 'EJECUTADO'),
(13, '2025-06-10', '478', 'Famabalasto', 'Santa María', 'Relevamiento del estado del edificio', 1, 2, 'Marcelo Figueroa', 'EJECUTADO'),
(14, '2025-06-13', '292', 'La Merced', 'Paclín', 'Relevamiento de la inst. eléctrica para colocar caloventores', 2, 1, 'Seco y Bonaterra', 'EJECUTADO'),
(15, '2025-06-17', '58, 320 y 290 ', 'La Quebrada, Entre Ríos y San José', 'Santa María', 'Relevamiento del estado del edificio', 2, 2, 'Avellaneda Nancy y Cuezo Lorena', 'NO APROBADO'),
(16, '2025-06-18', 'Sec. N° 58', 'San Antonio ', 'La Paz', 'Relevamiento de problemas de albañilería y plomería', 2, 1, 'Barrionuevo Nestor y Toloza Daniel', 'EJECUTADO'),
(17, '2025-06-24', 'J.IN.N ° 27 de la Esc. 371', 'El Bolsón', 'Ambato', 'Relevamiento de la inst. eléctrica para colocar caloventores', 2, 1, 'Seco Guillermo y Robledo Marcos', 'NO APROBADO'),
(18, '2025-06-25', 'Especial N° 999', 'Los Altos ', 'Santa Rosa', 'Relevamiento de la situación del edificio', 2, 1, 'Avellaneda Nancy y Cuezo Lorena', 'EJECUTADO'),
(19, '2025-06-18', 'N° 277', 'Tapso', 'La Paz', 'Desobstrucción de cañerías de cámaras y pozo absorbente.', 2, 1, 'Tula Daniel y Dávila Luis', 'EJECUTADO'),
(20, '2025-06-27', 'J.IN.N ° 19 de la Esc. 224 ', 'Fiamabalá', 'Tinogasta', 'Arreglo de conexiones eléctricas y provisión de agua potable', 3, 1, 'Electricistas y plomero', 'NO APROBADO'),
(21, '2025-07-10', 'N° 47', 'San Martín ', 'Capayán', 'Colocación de disyuntor, cambio de llave térmica y colocación de dos automáticos. Plomería: reparación de pérdidfas de agua en cisterna y revisar otros problemas', 4, 1, 'Robledo Marcos, Seco Guillermo, Tula Daniel y Dávila Luis', 'EJECUTADO'),
(22, '2025-07-18', 'N° 299', 'Tatón', 'Tinogasta', 'Relevamiento para colocar aires acondicionados', 2, 2, 'Robledo Marcos y Bonaterra Sebastián', 'EJECUTADO'),
(23, '2025-08-04', 'Escuela Rural N° 1', 'Singuil', 'Ambato', 'Reparación de corto circuito y cambio de llaves térmicas', 2, 1, 'Acosta José y Villagra', 'EJECUTADO'),
(24, '2025-08-07', 'N° 292', 'La Merced', 'Paclín', 'Colocación de luminarias y caloventores', 3, 2, 'Robledo Marco, Seco Guillermo y Bonaterra Sebastián ', 'SUSPENDIDA'),
(25, '2025-08-13', 'EPET N° 4', 'Ciudad ', 'Andalgalá', 'Colocación de pilar de luz, acometida, toma a tierra, llaves térmicas y tablero principal.', 3, 2, 'Robledo Marco, Seco Guillermo y Bonaterra Sebastián ', 'EJECUTADO'),
(26, '2025-07-31', 'N° 47', 'San Martín ', 'Capayán', 'Relevamiento para refuncionalizar una biblioteca', 2, 1, 'Toloza y Bazán', 'EJECUTADO'),
(27, '2025-08-21', 'N° 292', 'La Merced', 'Pacín', 'Instalación eléctrica para colocar caloventores', 3, 2, 'Robledo Marco, Seco Guillermo y Bonaterra Sebastián ', 'SUSPENDIDA'),
(28, '2025-08-06', 'N° 380', 'Achalco', 'El Alto', 'Relevamiento del edificio escolar y sala de jardín amedio construir', 2, 1, 'Arq. Bellantes Pablo y Arq. Pérez Ariel', 'SUSPENDIDA'),
(29, '2025-08-28', 'N° 322 Y Esc. Sec. Rural 3', 'Cañada de Páez', 'Ancasti', 'Relevamiento de la instalación eléctrica (corto circuito)', 2, 1, 'Robledo Marco, Seco Guillermo y Bonaterra Sebastián ', 'REPROGRAMADA'),
(30, '2025-08-21', 'N° 277', 'Tapso', 'La Paz', 'Ejecución de básica sanitaria, reparación de pérdida de agua en sanitarios, reemplazo de grifos presmatic y válvulas de descarga.', 3, 2, 'Tula Daniel, Dávila Luis y Barrionuevo Nestor', 'EJECUTADO'),
(31, '2025-08-21', 'N° 277', 'Tapso', 'La Paz', 'Ejecución de básica sanitaria, reparación de pérdida de agua en sanitarios, reemplazo de grifos presmatic y válvulas de descarga.', 3, 2, 'Tula Daniel, Dávila Luis y Barrionuevo Nestor', 'EJECUTADO'),
(32, '2025-09-04', 'EPET N° 4', 'Ciudad ', 'Andalgalá', 'Colocación de pilar de luz, acometida, toma a tierra, llaves térmicas y tablero principal.', 3, 2, 'Robledo Marco, Seco Guillermo y Bonaterra Sebastián ', 'REPROGRAMADO'),
(33, '0000-00-00', '', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_pendientes`
--

CREATE TABLE `mantenimiento_pendientes` (
  `id` int NOT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `establecimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pedido` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento_pendientes`
--

INSERT INTO `mantenimiento_pendientes` (`id`, `localidad`, `establecimiento`, `pedido`) VALUES
(1, 'Capital', 'Esc. Sec. N° 77', 'Repósición de griferías en sanitarios'),
(2, 'Capital', 'Esc. N° 323', 'Reparación de núcleos sanitarios'),
(3, 'Capital', 'J.I.N.N° 6 de la Esc. N° 28', 'Colocación de grifos en mesada de cocina'),
(4, 'Valle Viejo', 'Esc. N° 367', 'Reparación de núcleos sanitarios'),
(5, 'Valle Viejo', 'Esc. Esp. N° 7', 'Adaptación de sanitario (inodoro-bidé)'),
(6, 'Esquiú-La Paz', 'Esc. Sec. N° 57', 'Reparación de la instalación eléctrica'),
(7, 'Capital', 'J.I.N. N° 6 Anexo 02', 'Provisión de luminarias'),
(8, 'Capital', 'J.I.N. N° 37 de la Esc. N° 992', 'Provisión de luminaria en interior y exteriores'),
(9, 'Capital', 'Esc. N° 180', 'Colocación de artefactos y luminarias'),
(10, 'Capital', 'Esc. Sec. N° 5', 'Colocación de iluminación en auklas y en exteriores'),
(11, 'Capital', 'Esc. Sec. N° 47', 'Colocación de luminarias faltantes en SUM Y pasillos'),
(12, 'Capital', 'Esc. Sec. N° 52', 'Colocación de automático en tanque y colocación de artefactos en exteriores y lámpars en interiores'),
(13, 'Capital', 'Esc. N° 323 ', 'Colocación de iluminación en exteriores'),
(14, 'Valle Viejo', 'ESC. N° 47 -San Martín', 'Reparación de sanitarios'),
(15, 'Valle Viejo', 'J.I.N. N° 13 de la Esc. N°31', 'Reparación de sanitarios'),
(16, 'Capital', 'ESC. N° 161 Islas Malvinas', 'Reparción de sanitarios'),
(17, 'Valle Viejo', 'ESC. N° 367- Santa Cruz', 'Reparación de sanitarios'),
(18, 'Capital', 'ESC. N° 230- Banda de Vare', 'Reparación de sanitarios'),
(19, 'Capital', 'N° 296 ', 'Pérdida de tanque de agua. Construir bancos de aulas H° A°'),
(20, 'Capital', 'N° 182', 'Soldar sillas y bisagras '),
(21, 'Capital', 'N° 180', 'Reparar tanque de agua'),
(22, 'Capital', 'J.I.N.N° 7 de la Esc. N° 196', 'Reparar llave de paso en tanque'),
(23, 'Capital', 'J.I.N.N° 8 de la Esc. N° 199', 'Reparar pérdidas de agua en sanitarios'),
(24, 'Capital', 'Esc. Sec. N° 2 Clara J.A.', 'Reparación de baños del salón'),
(25, 'Capital', 'J.I.N.N° 2 de la Esc. N° 243', 'Reparar pérdidas de agua en sanitarios'),
(26, 'Capital', 'J.I.N. N° 6 Anexo N° 2', 'Pérdida de agua en sanitarios'),
(27, 'Capital', 'Esc. Sec. N° 5 Galíndez', 'Reparar pulsadores de inodoros '),
(28, 'Capital', 'J.I.N.N° 2 de la Esc. N° 323', 'Cambio, extracción y retiro de juegos'),
(29, 'Huaco Sur - Belen', 'N° 498', 'Sistema de provisión de agua potable de red insuficiente y deficiente.'),
(30, 'Capital', 'J.I.N. N° 7 de la Esc. N° 182', 'Reparación de sanitarios'),
(31, 'Capital', 'Especial N° 10', 'Reemplazo de grifos en cocina y baños'),
(32, 'Capital', 'Sec. N° 84 -La Viñita', 'Reparación de sanitarios'),
(33, 'Capital', 'J.I.N. N° 7 de la 196', 'Reparación de tanque de agua '),
(34, 'Capital', 'N° 296 -La Chacarita', 'Reparación de brida de tanque de agua'),
(35, 'Capital', 'Pabellón N° 14', 'Reparación de sanitarios de mujeres'),
(36, 'Capital', 'J.I.N. N° 7 de la Esc. N° 182', 'Reparación de sanitarios'),
(37, 'Valle Viejo', 'Esc. N° 202 ', 'Reparación de sanitarios y cocina'),
(38, 'Capital', 'Sec. N° 3 - Jorge Newbery', 'Reparación de sanitarios'),
(39, 'Capital', 'Esc. Especial N° 10', 'Reparación de sanitarios'),
(40, 'Capayán', 'Esc. N° 47 San Martín', 'Acondiconamiento de aula de Informática'),
(41, 'Capital', 'Esc. Sec. N° 7', 'Reemplazo de tanque de agua'),
(42, 'Capital', 'Esc. Especial N° 34', 'Reemplazo de bomba de agua'),
(43, 'Las Tejas', 'N° 312', 'Construcción de rejas perimetrales'),
(44, 'Valle Viejo', 'N° 202 W. Rojas', 'Reparación de sanitarios'),
(45, 'Capital', 'Sec. N° 84 -La Viñita', 'Reparación de sanitarios'),
(46, 'Capital', 'J.I.N. N° 7 de la 196', 'Reparación de tanque de agua '),
(47, 'Capital', 'N° 296 -La Chacarita', 'Reparación de brida de tanque de agua'),
(48, 'CAPE', 'Pabellón N° 14', 'Reparación de sanitarios de mujeres. Pérdidas de agua en tanque '),
(49, 'Capital', 'J.I.N. N° 38 de la 126', 'Pérdidas de agua en tanque '),
(50, 'Capayán', 'J.I.N. de la Esc. N° 239 ', 'Reparación de filtraciones del techo'),
(51, 'Capital', 'J.I.N. Riberas del Valle', 'Desobstrucción de cámaras'),
(52, 'Capital', 'N° 180 Parque América', 'Reparación de pérdidas de agua en bomba'),
(53, 'Capital', 'J.I.N. N° 7 de la Esc. N° 182', 'Reparación de sanitarios'),
(54, 'Capital', 'Esc. Sec. N° 93', 'Colocación de iluminación en el ingreso '),
(55, 'Valle Viejo', 'N° 201 Sumalao', 'Cambio de llaves térmicas'),
(56, 'Cape', 'Pabellón N° 14 (Nivel Inicial)', 'Inst. eléctrica en oficina'),
(57, 'Ambato', 'Esc. Sec. Rural N° 1 -Singuil', 'Corto circuito, equilibrar fases (Comisión )'),
(58, 'Capayán', 'J.I.N. de la Esc. N° 239 ', 'Problemas de electricidad'),
(59, 'Paclín', 'N° 387 La Bajada', 'Cambio de llaves térmicas en pilar'),
(60, 'Valle Viejo', 'N° 201 Sumalao', 'Cambio de llaves térmicas'),
(61, 'Capayán', 'J.I.N. de la Esc. N° 239 ', 'Problemas de electricidad'),
(62, 'Capital', 'Esc. Especial N° 34', 'Reemplazo de bomba de agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_27_004809_create_prespuesto_edu_gral_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prespuesto_edu_gral`
--

CREATE TABLE `prespuesto_edu_gral` (
  `id` bigint UNSIGNED NOT NULL,
  `unidad_ejecutora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concepto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` int NOT NULL,
  `presupuesto_vigente` decimal(15,2) NOT NULL DEFAULT '0.00',
  `devengado` decimal(15,2) NOT NULL DEFAULT '0.00',
  `pagado` decimal(15,2) NOT NULL DEFAULT '0.00',
  `fecha_pago` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prespuesto_edu_gral`
--

INSERT INTO `prespuesto_edu_gral` (`id`, `unidad_ejecutora`, `concepto`, `ano`, `presupuesto_vigente`, `devengado`, `pagado`, `fecha_pago`, `created_at`, `updated_at`) VALUES
(1, 'Consejo Provincial de Educación', 'Obra 2', 2021, 2720084.92, 2507040.13, 1809220.08, '2016-02-23', '2025-06-28 04:30:59', '2025-06-28 04:30:59'),
(2, 'Ministerio de Educación', 'Conectividad Escolar', 2020, 4852839.72, 345178.79, 459123.79, '1996-05-21', '2025-06-28 04:30:59', '2025-06-28 04:30:59'),
(3, 'Subsecretaría de Planificación', 'Escuela 1', 2023, 3174196.12, 265470.19, 627647.92, '1982-08-31', '2025-06-28 04:31:00', '2025-06-28 04:31:00'),
(4, 'Consejo Provincial de Educación', 'Capacitación Docente', 2021, 4593118.23, 1388688.49, 264163.87, '1975-03-07', '2025-06-28 04:31:00', '2025-06-28 04:31:00'),
(5, 'Dirección General de Escuelas', 'Programa 2', 2022, 2057863.68, 2956801.09, 1859924.71, '1970-06-19', '2025-06-28 04:31:00', '2025-06-28 04:31:00'),
(6, 'Dirección General de Escuelas', 'Escuela 2', 2024, 3037978.79, 3368800.63, 860430.46, '1991-05-02', '2025-06-28 04:31:01', '2025-06-28 04:31:01'),
(7, 'Subsecretaría de Planificación', 'Escuela 1', 2023, 4988114.82, 687950.95, 514524.35, '1996-09-17', '2025-06-28 04:31:01', '2025-06-28 04:31:01'),
(8, 'Subsecretaría de Planificación', 'Equipamiento Escolar', 2022, 3698854.77, 1054177.06, 1344674.31, '1992-11-26', '2025-06-28 04:31:01', '2025-06-28 04:31:01'),
(9, 'Ministerio de Educación', 'Obra 2', 2023, 1869793.73, 946170.63, 1434674.99, '1994-09-10', '2025-06-28 04:31:02', '2025-06-28 04:31:02'),
(10, 'Ministerio de Educación', 'Escuela 1', 2025, 3448663.09, 477772.31, 2755951.53, '1988-08-20', '2025-06-28 04:31:02', '2025-06-28 04:31:02'),
(11, 'Dirección General de Escuelas', 'Capacitación Docente', 2020, 919500.42, 1696961.36, 1439714.25, '1990-06-03', '2025-06-28 04:31:02', '2025-06-28 04:31:02'),
(12, 'Ministerio de Educación', 'Programa 1', 2020, 1250066.07, 1121679.35, 1974144.62, '1974-10-11', '2025-06-28 04:31:03', '2025-06-28 04:31:03'),
(13, 'Dirección General de Escuelas', 'Obra 1', 2023, 3677726.54, 2739696.81, 2486295.12, '2000-11-24', '2025-06-28 04:31:03', '2025-06-28 04:31:03'),
(14, 'Ministerio de Educación', 'Programa 1', 2020, 1823480.13, 833790.72, 1143795.83, '2022-02-06', '2025-06-28 04:31:03', '2025-06-28 04:31:03'),
(15, 'Subsecretaría de Planificación', 'Escuela 2', 2022, 3574408.77, 1912773.27, 682651.56, '2016-06-13', '2025-06-28 04:31:04', '2025-06-28 04:31:04'),
(16, 'Dirección General de Escuelas', 'Obra 2', 2024, 1430054.13, 3274979.35, 1187827.86, '2023-10-03', '2025-06-28 04:31:04', '2025-06-28 04:31:04'),
(17, 'Ministerio de Educación', 'Programa 2', 2024, 2337079.20, 574218.84, 1798298.20, '2025-04-29', '2025-06-28 04:31:04', '2025-06-28 04:31:04'),
(18, 'Ministerio de Educación', 'Conectividad Escolar', 2021, 1203180.45, 969411.93, 722820.22, '2003-07-10', '2025-06-28 04:31:05', '2025-06-28 04:31:05'),
(19, 'Dirección General de Escuelas', 'Capacitación Docente', 2025, 1154326.77, 3861228.64, 2660969.71, '2001-08-19', '2025-06-28 04:31:05', '2025-06-28 04:31:05'),
(20, 'Subsecretaría de Planificación', 'Equipamiento Escolar', 2025, 1820317.54, 3881577.71, 1637301.98, '1996-09-05', '2025-06-28 04:31:06', '2025-06-28 04:31:06'),
(21, 'Consejo Provincial de Educación', 'Escuela 1', 2023, 1793920.00, 1876247.55, 498289.39, '2006-04-26', '2025-06-28 04:31:06', '2025-06-28 04:31:06'),
(22, 'Dirección General de Escuelas', 'Conectividad Escolar', 2022, 4783161.89, 1675240.72, 2991741.97, '1974-12-03', '2025-06-28 04:31:06', '2025-06-28 04:31:06'),
(23, 'Dirección General de Escuelas', 'Programa 1', 2021, 706079.60, 1840819.94, 2078076.97, '1981-11-23', '2025-06-28 04:31:07', '2025-06-28 04:31:07'),
(24, 'Dirección General de Escuelas', 'Programa 1', 2024, 3740919.42, 69266.79, 835390.96, '1982-11-21', '2025-06-28 04:31:07', '2025-06-28 04:31:07'),
(25, 'Subsecretaría de Planificación', 'Programa 2', 2025, 3586226.43, 3633978.26, 2298509.96, '1978-09-06', '2025-06-28 04:31:07', '2025-06-28 04:31:07'),
(26, 'Subsecretaría de Planificación', 'Obra 1', 2020, 4969146.89, 2679843.10, 907689.59, '2010-05-12', '2025-06-28 04:31:08', '2025-06-28 04:31:08'),
(27, 'Ministerio de Educación', 'Obra 2', 2022, 3649385.86, 2935983.09, 1879773.45, '1982-07-22', '2025-06-28 04:31:08', '2025-06-28 04:31:08'),
(28, 'Subsecretaría de Planificación', 'Obra 2', 2023, 1228446.35, 862196.64, 2655705.78, '1983-12-22', '2025-06-28 04:31:08', '2025-06-28 04:31:08'),
(29, 'Ministerio de Educación', 'Escuela 1', 2023, 2366822.23, 3171432.39, 1099638.87, '2011-01-13', '2025-06-28 04:31:09', '2025-06-28 04:31:09'),
(30, 'Subsecretaría de Planificación', 'Programa 2', 2021, 3558329.37, 3014811.77, 2574017.73, '1982-09-14', '2025-06-28 04:31:09', '2025-06-28 04:31:09'),
(31, 'Ministerio de Educación', 'Escuela 2', 2024, 4987807.47, 549672.12, 1213874.38, '1996-01-31', '2025-06-28 04:31:09', '2025-06-28 04:31:09'),
(32, 'Consejo Provincial de Educación', 'Mejora Edilicia', 2022, 3526895.73, 700405.37, 177096.86, '1995-03-30', '2025-06-28 04:31:10', '2025-06-28 04:31:10'),
(33, 'Ministerio de Educación', 'Conectividad Escolar', 2022, 2864000.42, 3995338.20, 2765371.27, '1986-11-17', '2025-06-28 04:31:10', '2025-06-28 04:31:10'),
(34, 'Consejo Provincial de Educación', 'Escuela 1', 2025, 4437073.05, 2730609.41, 75064.34, '1990-12-03', '2025-06-28 04:31:10', '2025-06-28 04:31:10'),
(35, 'Consejo Provincial de Educación', 'Escuela 1', 2025, 4378531.68, 1507592.85, 2109839.68, '2013-04-04', '2025-06-28 04:31:11', '2025-06-28 04:31:11'),
(36, 'Subsecretaría de Planificación', 'Escuela 1', 2022, 4004706.96, 3285700.22, 2531080.44, '2007-05-18', '2025-06-28 04:31:11', '2025-06-28 04:31:11'),
(37, 'Subsecretaría de Planificación', 'Mejora Edilicia', 2025, 4711135.10, 1211531.08, 1934767.19, '2007-06-12', '2025-06-28 04:31:11', '2025-06-28 04:31:11'),
(38, 'Consejo Provincial de Educación', 'Capacitación Docente', 2020, 2040713.53, 2318262.14, 989627.85, '2011-06-09', '2025-06-28 04:31:12', '2025-06-28 04:31:12'),
(39, 'Ministerio de Educación', 'Programa 2', 2022, 2809100.22, 327662.90, 833494.60, '1971-07-20', '2025-06-28 04:31:12', '2025-06-28 04:31:12'),
(40, 'Dirección General de Escuelas', 'Obra 2', 2025, 2859822.94, 1445280.97, 2856092.94, '1995-06-15', '2025-06-28 04:31:12', '2025-06-28 04:31:12'),
(41, 'Ministerio de Educación', 'Escuela 2', 2020, 1320338.78, 1783131.19, 1064967.86, '2019-03-20', '2025-06-28 04:31:13', '2025-06-28 04:31:13'),
(42, 'Consejo Provincial de Educación', 'Escuela 1', 2024, 4221372.22, 495013.54, 229846.61, '1975-08-25', '2025-06-28 04:31:13', '2025-06-28 04:31:13'),
(43, 'Dirección General de Escuelas', 'Obra 1', 2022, 157717.75, 1291452.57, 1317792.50, '1996-01-29', '2025-06-28 04:31:13', '2025-06-28 04:31:13'),
(44, 'Dirección General de Escuelas', 'Escuela 2', 2023, 4902943.48, 1552932.09, 1701771.80, '1973-03-10', '2025-06-28 04:31:14', '2025-06-28 04:31:14'),
(45, 'Consejo Provincial de Educación', 'Programa 1', 2024, 3816981.40, 1382524.27, 2781484.72, '2010-03-15', '2025-06-28 04:31:14', '2025-06-28 04:31:14'),
(46, 'Ministerio de Educación', 'Mejora Edilicia', 2021, 4415762.20, 319318.40, 2703596.71, '1994-03-07', '2025-06-28 04:31:15', '2025-06-28 04:31:15'),
(47, 'Consejo Provincial de Educación', 'Escuela 2', 2023, 1021166.34, 2161641.07, 730948.70, '1972-11-18', '2025-06-28 04:31:15', '2025-06-28 04:31:15'),
(48, 'Subsecretaría de Planificación', 'Programa 1', 2024, 3280861.94, 245646.93, 2512737.27, '2003-09-22', '2025-06-28 04:31:15', '2025-06-28 04:31:15'),
(49, 'Consejo Provincial de Educación', 'Programa 1', 2025, 1481165.08, 527120.89, 1333779.60, '2011-08-14', '2025-06-28 04:31:16', '2025-06-28 04:31:16'),
(50, 'Consejo Provincial de Educación', 'Escuela 1', 2021, 1991276.04, 301484.23, 803151.45, '2020-10-28', '2025-06-28 04:31:16', '2025-06-28 04:31:16'),
(51, 'Subsecretaría de Planificación', 'Equipamiento Escolar', 2023, 2090404.86, 1392636.80, 2928008.13, '1980-07-19', '2025-06-28 04:31:16', '2025-06-28 04:31:16'),
(52, 'Dirección General de Escuelas', 'Escuela 2', 2021, 2112973.95, 1126641.64, 1505495.37, '2009-12-10', '2025-06-28 04:31:17', '2025-06-28 04:31:17'),
(53, 'Consejo Provincial de Educación', 'Escuela 1', 2025, 3453251.74, 1621293.07, 569572.07, '2003-09-28', '2025-06-28 04:31:17', '2025-06-28 04:31:17'),
(54, 'Dirección General de Escuelas', 'Mejora Edilicia', 2024, 3218360.86, 2247306.69, 718909.62, '2019-11-26', '2025-06-28 04:31:17', '2025-06-28 04:31:17'),
(55, 'Ministerio de Educación', 'Conectividad Escolar', 2022, 1174412.19, 3819929.05, 2179040.47, '1995-04-13', '2025-06-28 04:31:18', '2025-06-28 04:31:18'),
(56, 'Ministerio de Educación', 'Obra 2', 2021, 3533567.94, 188556.31, 1034494.59, '1976-12-01', '2025-06-28 04:31:18', '2025-06-28 04:31:18'),
(57, 'Dirección General de Escuelas', 'Escuela 1', 2024, 2200498.02, 1246919.79, 168436.31, '1977-12-12', '2025-06-28 04:31:18', '2025-06-28 04:31:18'),
(58, 'Ministerio de Educación', 'Equipamiento Escolar', 2020, 2640498.82, 2212991.58, 1426521.69, '1982-07-16', '2025-06-28 04:31:19', '2025-06-28 04:31:19'),
(59, 'Dirección General de Escuelas', 'Obra 1', 2024, 2790546.18, 222909.83, 2593512.89, '2005-12-28', '2025-06-28 04:31:19', '2025-06-28 04:31:19'),
(60, 'Dirección General de Escuelas', 'Equipamiento Escolar', 2020, 307703.16, 2713934.64, 1608714.17, '1998-05-18', '2025-06-28 04:31:19', '2025-06-28 04:31:19'),
(61, 'Dirección General de Escuelas', 'Capacitación Docente', 2022, 517309.90, 2518088.61, 1939082.89, '2016-09-15', '2025-06-28 04:31:20', '2025-06-28 04:31:20'),
(62, 'Ministerio de Educación', 'Programa 2', 2022, 3893778.85, 3467321.76, 1222446.95, '1997-03-28', '2025-06-28 04:31:20', '2025-06-28 04:31:20'),
(63, 'Subsecretaría de Planificación', 'Equipamiento Escolar', 2022, 950812.17, 592672.27, 918263.52, '1985-01-16', '2025-06-28 04:31:20', '2025-06-28 04:31:20'),
(64, 'Dirección General de Escuelas', 'Capacitación Docente', 2020, 4180981.11, 3772789.05, 564819.68, '1986-04-23', '2025-06-28 04:31:21', '2025-06-28 04:31:21'),
(65, 'Subsecretaría de Planificación', 'Conectividad Escolar', 2020, 2396331.45, 3224973.75, 2308044.97, '1973-11-26', '2025-06-28 04:31:21', '2025-06-28 04:31:21'),
(66, 'Consejo Provincial de Educación', 'Programa 1', 2022, 1593491.67, 1685931.01, 1055571.07, '1971-06-15', '2025-06-28 04:31:22', '2025-06-28 04:31:22'),
(67, 'Subsecretaría de Planificación', 'Conectividad Escolar', 2025, 3722398.53, 2409441.48, 202639.13, '2016-08-15', '2025-06-28 04:31:22', '2025-06-28 04:31:22'),
(68, 'Ministerio de Educación', 'Capacitación Docente', 2020, 437067.91, 3244972.92, 1470506.74, '2002-09-28', '2025-06-28 04:31:22', '2025-06-28 04:31:22'),
(69, 'Consejo Provincial de Educación', 'Escuela 2', 2020, 4269398.94, 2448260.60, 2121959.21, '2011-11-12', '2025-06-28 04:31:23', '2025-06-28 04:31:23'),
(70, 'Subsecretaría de Planificación', 'Obra 2', 2025, 1449124.61, 1199091.83, 260549.85, '1976-07-30', '2025-06-28 04:31:23', '2025-06-28 04:31:23'),
(71, 'Dirección General de Escuelas', 'Programa 1', 2022, 4198719.52, 3633017.92, 1023080.94, '1992-10-07', '2025-06-28 04:31:23', '2025-06-28 04:31:23'),
(72, 'Ministerio de Educación', 'Conectividad Escolar', 2025, 3792979.25, 3203807.44, 2711019.26, '1975-04-06', '2025-06-28 04:31:24', '2025-06-28 04:31:24'),
(73, 'Consejo Provincial de Educación', 'Escuela 2', 2023, 4082926.20, 3403270.93, 2268587.05, '1999-04-14', '2025-06-28 04:31:24', '2025-06-28 04:31:24'),
(74, 'Consejo Provincial de Educación', 'Obra 2', 2023, 4454636.42, 836834.03, 2318126.34, '2024-06-17', '2025-06-28 04:31:24', '2025-06-28 04:31:24'),
(75, 'Subsecretaría de Planificación', 'Mejora Edilicia', 2024, 3330748.52, 2734332.84, 30138.18, '2025-02-10', '2025-06-28 04:31:25', '2025-06-28 04:31:25'),
(76, 'Ministerio de Educación', 'Programa 1', 2022, 1591934.74, 2998103.80, 514683.74, '1981-10-22', '2025-06-28 04:31:25', '2025-06-28 04:31:25'),
(77, 'Ministerio de Educación', 'Equipamiento Escolar', 2025, 3808554.00, 109776.48, 929900.01, '2011-03-13', '2025-06-28 04:31:25', '2025-06-28 04:31:25'),
(78, 'Dirección General de Escuelas', 'Programa 2', 2021, 2061433.12, 1854370.74, 1708160.24, '2000-06-24', '2025-06-28 04:31:26', '2025-06-28 04:31:26'),
(79, 'Dirección General de Escuelas', 'Obra 1', 2025, 4333998.88, 1617738.70, 856368.74, '1999-07-01', '2025-06-28 04:31:26', '2025-06-28 04:31:26'),
(80, 'Ministerio de Educación', 'Equipamiento Escolar', 2021, 3992905.03, 344182.66, 1779567.21, '1988-07-22', '2025-06-28 04:31:26', '2025-06-28 04:31:26'),
(81, 'Ministerio de Educación', 'Equipamiento Escolar', 2024, 151612.39, 2855001.26, 1456933.79, '1979-03-15', '2025-06-28 04:31:27', '2025-06-28 04:31:27'),
(82, 'Consejo Provincial de Educación', 'Obra 1', 2023, 3173173.75, 3202660.15, 204464.68, '2022-09-28', '2025-06-28 04:31:27', '2025-06-28 04:31:27'),
(83, 'Consejo Provincial de Educación', 'Programa 1', 2023, 3905523.40, 487434.79, 2522395.32, '2004-11-28', '2025-06-28 04:31:27', '2025-06-28 04:31:27'),
(84, 'Dirección General de Escuelas', 'Escuela 1', 2022, 143439.68, 2021545.71, 196493.85, '1990-09-10', '2025-06-28 04:31:28', '2025-06-28 04:31:28'),
(85, 'Ministerio de Educación', 'Capacitación Docente', 2021, 4065723.61, 2895322.33, 914092.69, '2003-06-11', '2025-06-28 04:31:28', '2025-06-28 04:31:28'),
(86, 'Subsecretaría de Planificación', 'Escuela 2', 2022, 984897.15, 355041.77, 1508511.33, '2001-09-10', '2025-06-28 04:31:28', '2025-06-28 04:31:28'),
(87, 'Ministerio de Educación', 'Escuela 2', 2023, 337480.97, 3394014.18, 1858078.56, '2016-09-30', '2025-06-28 04:31:29', '2025-06-28 04:31:29'),
(88, 'Consejo Provincial de Educación', 'Equipamiento Escolar', 2021, 430230.21, 1814188.05, 2920747.85, '2012-10-03', '2025-06-28 04:31:29', '2025-06-28 04:31:29'),
(89, 'Consejo Provincial de Educación', 'Conectividad Escolar', 2025, 1317913.84, 2938995.44, 627698.09, '1989-08-04', '2025-06-28 04:31:30', '2025-06-28 04:31:30'),
(90, 'Dirección General de Escuelas', 'Equipamiento Escolar', 2023, 4752858.94, 2316759.55, 2367075.78, '1992-10-11', '2025-06-28 04:31:30', '2025-06-28 04:31:30'),
(91, 'Subsecretaría de Planificación', 'Obra 1', 2023, 678612.19, 139537.21, 542676.48, '2023-10-04', '2025-06-28 04:31:30', '2025-06-28 04:31:30'),
(92, 'Subsecretaría de Planificación', 'Obra 2', 2021, 565121.54, 91159.33, 2796237.70, '1985-08-03', '2025-06-28 04:31:31', '2025-06-28 04:31:31'),
(93, 'Consejo Provincial de Educación', 'Programa 1', 2022, 3181258.62, 942247.59, 2157638.71, '1975-11-18', '2025-06-28 04:31:31', '2025-06-28 04:31:31'),
(94, 'Dirección General de Escuelas', 'Escuela 2', 2021, 3546031.86, 2327836.10, 790821.83, '2021-02-06', '2025-06-28 04:31:31', '2025-06-28 04:31:31'),
(95, 'Subsecretaría de Planificación', 'Mejora Edilicia', 2025, 3885731.14, 928878.04, 267034.08, '1989-09-22', '2025-06-28 04:31:32', '2025-06-28 04:31:32'),
(96, 'Dirección General de Escuelas', 'Capacitación Docente', 2021, 1829692.88, 1557539.83, 1175889.07, '1987-09-20', '2025-06-28 04:31:32', '2025-06-28 04:31:32'),
(97, 'Consejo Provincial de Educación', 'Programa 1', 2025, 4336946.99, 3886270.26, 1310598.32, '1991-04-25', '2025-06-28 04:31:32', '2025-06-28 04:31:32'),
(98, 'Ministerio de Educación', 'Obra 1', 2020, 4072463.67, 3696576.25, 555561.14, '1979-06-07', '2025-06-28 04:31:33', '2025-06-28 04:31:33'),
(99, 'Ministerio de Educación', 'Capacitación Docente', 2025, 1082017.89, 710885.77, 1563321.97, '1995-02-18', '2025-06-28 04:31:33', '2025-06-28 04:31:33'),
(100, 'Dirección General de Escuelas', 'Programa 2', 2021, 2829064.14, 3040277.09, 2625917.00, '1982-03-06', '2025-06-28 04:31:33', '2025-06-28 04:31:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7MT3b7h6U8itlvfNFzbuA01bt0NEQwHZMdZL8Et7', NULL, '100.64.0.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWw4cE96dGVxSkdvYTY5VXpaOU1IY3k1b0h1WGpWRE9BT1JhWWY1MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL29yZ2FuaWdyYW1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757947945),
('8eH6wDPAoSq9cR3WA3Hnb2bnOJSgdm9R4OWnLI4F', NULL, '100.64.0.4', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzVTS3FoM0RFT24yYjBaaWpKMjE1bkdxUzNGUUVwT2N3N1lZdnFsdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757887918),
('8RsKmXQd6lWlXvSl8wHkykOCyPxgCmOhtO8bVkIc', NULL, '100.64.0.6', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEpta2F1U2dvaHRpQm04RGl3MlpnQ1FFdld0aDM3dzE4M0duRWVvcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757944391),
('9rV0uIZXGq0kQaJCMncA0M5VXoXNL1SOsGs5asX7', NULL, '100.64.0.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTUwWDhFS3dia2x5TVppeExESzB2TEdsVTc1ak1wQ1B3czR3dmNhQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757943006),
('aPTj3MVByFCfwcwA8NSeGoqUT37asNimynI63gIH', NULL, '100.64.0.3', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkFFV2VZNmVaSFd4NXRBRmxSc1JCeDJLMjJhNE9OWVpCTUNqRkRqayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757946300),
('b8pLsQxZ3MOONdKKaXuhY5C6YIRLyZVkP2E4tWwM', NULL, '100.64.0.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnQ1OHZna09HbU9DV1IxU0taamRXa29oVjNoUEg3MWJzWGNrTnZpMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL21hbnRlbmltaWVudG8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758030475),
('bELzpbwDYXHmeca7F9hd1AWBpFTjVWbr1CR9FqpO', NULL, '100.64.0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEZLS2U4bUNINkhianZtSXdLaHp2aVNpS2NiUWRhNTNWVVcwMmU5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757887866),
('CdK2GsVcBEhiVZ8ulDcVj9jzUQJrURmG8EHyuFzR', NULL, '100.64.0.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0lUV2VNUnNHNGhZclhTYkpxMFV4Q1JBeWswNkRsM0JUY1dKRGM0VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757717623),
('eAo2vP8Wm3OM5DWLDpz9nOL9OxniaO8BbmyqiwLC', NULL, '100.64.0.9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkU4NDNzWE1BNVBiRUtxMzgwVEFCc2FsQWlWcWZweExNWFJTUVdyciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758028158),
('Fo9X4OS7DyXPPAnBq6qKF5PbGqknr0JKJ89dkpCS', NULL, '100.64.0.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVdyNzgybWVvaVBWeVNtUHJYczFuMGVjbWZLM21hcUxHRlJzUTk0VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758028145),
('HprDxf07XsjoHJSSRLF9yBdGWilkvXEFf5RfFSdz', NULL, '100.64.0.7', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWJ4eUxYZ3ZtSTQ0UmdKTFJOemRGOHEzUzZFR25Jeko5eFN6YmpWWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757974801),
('iCWyuQC0XHJeVrA357QIcOVnHnYIqpsBy7Vl5AGb', NULL, '100.64.0.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2xsckVHQ3Q5WUZScVBUbXJQRVVsQU1KMU1wNVNhd0pSd1dUV0VCbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757953352),
('kwlWktOfxIjcLi3vbsk9mmplB4t88UEETVcBSWPu', NULL, '100.64.0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVJUUmtJOFlWMURwNDhLU0M1V09NdVlwQ2tLNVI3ZUh1cDRDcVhabyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL2VkdXRlY25pY2EiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757977328),
('mjVE1yj0mQp8li45IWxiMtb1KXAIfjgl5oncqqzT', NULL, '100.64.0.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielM5Y3VlaDd5TVhJcFlTb2psZXJiaUFJN2NQcExYcVYxN1luNEE2RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757951331),
('naTbbGbcR2W4sV8vFc9womTNuNCZKDoiLU4The1L', NULL, '100.64.0.2', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDVSbEZ3ZEF5MW01OG8wYWZiMENYdWFMdDFZSWlGZTBoZldzd3I0ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757950579),
('OdX8BjeG6YkI9m5VDlJdPdquG67CNReUwbHT7RK2', NULL, '100.64.0.3', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm1ZRVJ1ZTNEVHZJeFdMbnpVQWtZYmZHZThRRXJvZGdZM1FVSFpXVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757887879),
('OGG43b0cQG7glLNKUlHMIL5IuSV3M9Q3RfXDJL9P', NULL, '100.64.0.9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmp3QnJRSGpjRmtFd0lZeTNaRkdJd3F1dE9IWHY0ZGNkVndTSFRXUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758026251),
('PYOi60tn1gGOEAHblMHoA4z9j7EVshhMbSxvkcE0', NULL, '100.64.0.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU292ekwxc09iYVA2a0VoQ0VIRG1ucnFGdk82TkltUmpLd0hvb2hMbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL21hbnRlbmltaWVudG8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758026198),
('Q4IcfAUtHAaA1I2Jy5f9R3ZCTetHTsEdPzCapUu5', NULL, '100.64.0.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZ3QnFVVU1Kak93T3VkMmRvSGZRenMxRTAyU1RXbXFWek1WczRNbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL21hbnRlbmltaWVudG8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757968049),
('rs4e2LciY6ilyHBSTnTCBpMJANfl4a3mc0C0Q4mr', NULL, '100.64.0.2', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUZXeFY2U0lxWmYybnhjVHNvOFZBSzFyUk9oa2ZYdWtuUGhvREozYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757948074),
('SulIW5x9gqFWD6wpwJC8akcNMRCPSXQt50HtBgBa', NULL, '100.64.0.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnUxenJuRnFSNHpkRWtZSnl4ajBaR043MVp2enR2bDBxUWpzeFprSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757897352),
('tpNaC66HRnzovoW3GoMDi2qb7UgAgz3KT3tWm6yD', NULL, '100.64.0.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib09mNkhpcWRRU1J1a0N3NzlpaG5zVXZxVUdmNVpjMEJoVzJucWNlZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757944386),
('U2ZRGfYtcxgtdpI5IYd2qhwQ5zeniDiQfFMztNf9', NULL, '100.64.0.2', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM09wRVZ4TjZJUnhPS202ckh1OFBwbWVWU2hNbzZpTXNVNUhwYjFQRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVkYXRhL29yZ2FuaWdyYW1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757950684),
('vQV4vx24OIXFjxRTwezp0n3MtFfLmApY0C1A4xHY', NULL, '100.64.0.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUcyc0taQ0JzZnBGNXd0bFJWd1pkbjN5Q0Juenl5bk52SXpGa2dOZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757947691),
('ZOpXYDlfxNI2ueUWDHcQFQijbbWx2oB81VyP3m3I', NULL, '100.64.0.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2FwTDJ4cEdVeWJCQlVDWThMckIyd2RzRDl1NG12d1RxUVRnOU54TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758030457),
('Zvc7dL4Slj42UQYi2PWFftVuucngKwHbOGQLRFo8', NULL, '100.64.0.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTmxLdHJ6U096emtlOEVqcGR3NHpwM1JZZk1FT0RNWkZwd2lXNzl1UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDk6Imh0dHA6Ly93ZWItcHJvZHVjdGlvbi0xMDQ4MC51cC5yYWlsd2F5LmFwcC9lZHVyZWQiO319', 1758028254);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-06-28 04:30:58', '$2y$12$ZGcqVJsxqlSyYmgy87DgLOGD1g2dROGMZd0wCu33OiX4zfE3xjWem', 'UvD3sfHSgXmQ07L5PVC9sCoBUfUaAyYozPsZUL7uTuiYpoIvJcP8rzYPb6Ns', '2025-06-28 04:30:58', '2025-06-28 04:30:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion_compras`
--
ALTER TABLE `administracion_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento_comisiones`
--
ALTER TABLE `mantenimiento_comisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento_pendientes`
--
ALTER TABLE `mantenimiento_pendientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `prespuesto_edu_gral`
--
ALTER TABLE `prespuesto_edu_gral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion_compras`
--
ALTER TABLE `administracion_compras`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_comisiones`
--
ALTER TABLE `mantenimiento_comisiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_pendientes`
--
ALTER TABLE `mantenimiento_pendientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prespuesto_edu_gral`
--
ALTER TABLE `prespuesto_edu_gral`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
