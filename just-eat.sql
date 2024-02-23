-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 24, 2022 at 10:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `just-eat`
--

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `date_pedido` date NOT NULL,
  `sub_tot_pedido` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `total_pedido` decimal(10,2) NOT NULL,
  `metod_pago` text NOT NULL,
  `rest_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `date_pedido`, `sub_tot_pedido`, `envio`, `total_pedido`, `metod_pago`, `rest_id`, `user_id`) VALUES
(35, '2021-04-20', '21.48', '3.00', '24.48', 'mastercard', 1, 13),
(36, '2021-04-20', '34.00', '3.00', '37.00', 'mastercard', 16, 13),
(37, '2021-04-21', '14.00', '3.00', '17.00', 'mastercard', 16, 14),
(38, '2021-04-21', '32.85', '3.00', '35.85', 'mastercard', 11, 13),
(39, '2021-04-23', '16.69', '3.00', '19.69', 'paypal', 1, 1),
(40, '2021-04-25', '14.00', '3.00', '17.00', 'mastercard', 16, 13),
(41, '2021-04-29', '21.39', '3.00', '24.39', 'mastercard', 1, 13),
(42, '2021-08-27', '53.16', '3.00', '56.16', 'mastercard', 1, 1),
(43, '2022-03-16', '35.97', '3.00', '38.97', 'mastercard', 1, 1),
(44, '2022-04-23', '38.17', '3.00', '41.17', 'mastercard', 1, 1),
(45, '2022-04-23', '6.50', '3.00', '9.50', 'mastercard', 10, 1),
(46, '2022-04-25', '20.90', '3.00', '23.90', 'mastercard', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `producto` text NOT NULL,
  `descripcion` text NOT NULL,
  `img_product` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `rest_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `descripcion`, `img_product`, `precio`, `rest_id`) VALUES
(17, 'Director&#39;s choice de ternera', 'Carne de vacuno con queso cheddar, bacon ahumado con madera de haya, cebolla morada a la plancha, tomate, lechuga batavia, pan clásico artesanal y mayonesa', 'fh-director.jpg', '10.95', 11),
(18, 'Cheese burger de pollo', 'Pechuga de pollo a la parrilla con queso cheddar, tomate, lechuga batavia, pan clásico artesanal y mayonesa', 'fh-burguer-pollo.jpg', '11.55', 11),
(19, 'National star ribs costillar completo', 'Costillas de cerdo ahumadas a la parrilla. Se sirven acompañadas de guarnición y con la salsa que más te guste', 'fh-costillar.jpg', '18.75', 11),
(20, 'Bacon & cheese fries', 'Patatas fritas, mix de quesos y Bacon Crispy, con salsa ranchera', 'fh-bacon-cheese.jpg', '10.35', 11),
(21, 'Foster&#39;s chicken pops', 'Muslitos de alita de pollo con salsa búfalo picante, apio y salsa de queso azul. Indícanos si no quieres picante', 'fh-chicken-pops.jpg', '9.95', 11),
(22, 'Menú King Selection - Doble Old Style Mustard Onion', '\r\nRedoble de tambores... ¡Voilà!. La nueva King Selection ha llegado mejor que nunca. Entre dos panes de Brioche, 300gr de la mejor Carne Angus acompañada de Mostaza Dijon, rúcula, cebolla poché y queso mature. Inigualable.', 'bk-doble-old-style-mustard-onion.jpg', '11.99', 1),
(23, 'Menú Queen Cheese Doble Crispy Chicken®                      ', 'Para los amantes del pollo y el queso: Queen Cheese Doble Crispy Chicken®. Doble de pollo crispy sobre pan de quesos con extra de queso cheddar, queso gouda de cabra y crema de cabra. Acompañada de lechuga, tomate y cebolla crispy. Una vez la pruebas, no hay vuelta atrás.', 'bk-menu-queen-cheese-double.jpg', '9.49', 1),
(24, 'Bacon Cheese Bites x8', 'Cuando juntas mucho queso y mucho bacon, nada puede salir mal. Éxito asegurado con los Bacon Cheese Bites, para los que saben que el queso va hasta de acompañante.', 'bk-bacon-cheese-bites.jpg', '4.70', 1),
(25, 'King Aros de Cebolla® x13', 'Puedes pedirlos como entrante o guarnición, para compartir o para ti solo, son perfectos para todo, son redondos, están sabrosos, crujientes y dorados, solos o acompañados de una de tus salsas favoritas.', 'bk-aros-cebolla.jpg', '3.00', 1),
(26, 'Alitas de pollo x8', 'Estas alitas de pollo se han ganado su lugar en la carta de BURGER KING. Con un toque picante, este entrante es perfecto para los hambrientos amantes del pollo.', 'bk-alitas-pollo.jpg', '4.70', 1),
(27, 'Ensalada Cesare a Modo Tuo', 'Ensalada a base de lechuga, croutons, queso parmesano y salsa César. Elige entre pollo o bacon', 'gi-ensalada-cesare.jpg', '11.45', 3),
(28, 'Ensalada Nuova Caprese', 'Variedad de tomates con mozzarella di bufala con D.O. Campana, sobre una base de brotes frescos y albahaca', 'gi-ensalada-caprese.jpg', '10.95', 3),
(29, 'Pizza Vitella', 'Salsa pomodoro, mozzarella, carne picada aromatizada con especias, aceitunas negras, ajetes, dados de tomate, bacon y albahaca', 'gi-pizza-vitella.jpg', '13.50', 3),
(30, 'Pizza Carbonara', 'Mozzarella, cebolla roja Juliana, bacon, orégano seco y crème fraîche', 'gi-pizza-carbonara.jpg', '13.50', 3),
(31, 'Rigatoni al Forno', 'Con chorizo y champiñón, acompañados con nata, salsa de tomate y bechamel, gratinados con queso', 'gi-rigatoni-forno.jpg', '12.95', 3),
(32, 'Nachos Tex-Mex', 'Nachos de maíz, mezcla de quesos, cebolla, chorizo picado, chiles jalapeños, cilantro y crema agria', 'vp-nachos.jpg', '9.50', 12),
(33, 'Chicken Fingers', 'Fingers de pollo cornflakes con salsa BBQ Chipotle y salsa mostaza y miel', 'vp-fingers.jpg', '8.50', 12),
(34, 'Sandwich Cubano', 'Pulled pork, queso emmental y queso fundido, jamón cocido, mostaza, mayonesa y pepinillo, en pan maíz y semillas de calabaza. Servido con salsa mostaza y miel. Guarnición a elegir, pídelo con patatas gajo', 'vp-sandwich-cubano.jpg', '10.95', 12),
(35, 'Pollo Oriental', 'Tiras de pechuga de pollo salteadas, salsa agridulce de soja y piña, pimientos rojos, brócoli, anacardos, sésamo y arroz blanco', 'vp-pollo-oriental.jpg', '12.50', 12),
(36, 'Aguacate Chicken Burger', 'Pechuga de pollo a la plancha en pan de mollete, aguacate, tomate seco, cebolla a la plancha, rodajas de tomate, lechuga y salsa de yogur', 'vp-burger-aguacate.jpg', '12.25', 12),
(37, '10 Alitas y 10 McNuggets®', 'Irresistibles alitas de pollo y nuggets', 'md-alitas-nuggets.jpg', '10.45', 10),
(38, 'Grand McExtreme™ Double 1955', '¡Vuelve! La icónica Grand McExtreme 1955 y su deliciosa salsa, acompañada de cebolla asada, tomate, lechuga, dos carnes 100% vacuno y bacon.', 'md-mcextreme.jpg', '7.45', 10),
(39, 'American Style Chicken Creamy Parmesan', 'Nueva hamburguesa de la plataforma American Style Chicken, una nueva receta con tomate y sabrosa salsa de parmesano.', 'md-chicken-burger.jpg', '6.50', 10),
(40, 'McWrap® Chicken & Bacon', 'Pollo, bacon, tomate, lechuga y mayonesa', 'md-wrap-pollo.jpg', '5.40', 10),
(41, 'Top Fries Bacon & Cheese Deluxe para Compartir', 'Patatas  deluxe con salsa de queso y bacon', 'md-patatas-bacon.jpg', '4.15', 10),
(42, 'Rollitos Vietnamitas (Verduras), 2 Unidades ', 'Pimiento Rojo, Pimiento Verde, Bambú y Setas Chinas', 'hk-rollito.jpg', '3.50', 13),
(43, 'California de Salmón, 8 Piezas ', ' ', 'hk-california.jpg', '7.50', 13),
(44, 'Samosa Pollo, 2 Unidades ', 'Empanadillas. Hojas de hojaldre rellenas de verduras con especias ', 'na-samosas.jpg', '5.95', 14),
(45, ' Aloo Tikki, 2 Unidades ', 'Deliciosos pastelitos rellenos de lentejas y patatas condimentadas con especias ', 'na-aloo-tikki.jpg', '4.50', 14),
(46, 'Bogavante a la Plancha, 1Kg ', ' ', 'mno-bogavante.jpg', '65.00', 15),
(47, 'Pulpo a la Gallega ', '  ', 'mno-pulpo.jpg', '16.00', 15),
(48, 'Ceviche de Pescado', ' ', 'tp-ceviche.jpg', '13.50', 16),
(49, 'Pollo a la Brasa con Patatas Fritas, Ensalada y Salsas', ' ', 'tp-pollo-brasa.jpg', '20.00', 16);

-- --------------------------------------------------------

--
-- Table structure for table `product_pedido`
--

CREATE TABLE `product_pedido` (
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `producto` text NOT NULL,
  `precio_product` decimal(10,2) NOT NULL,
  `cant_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_pedido`
--

INSERT INTO `product_pedido` (`pedido_id`, `producto`, `precio_product`, `cant_product`) VALUES
(35, 'Menú King Selection - Doble Old Style Mustard Onion', '11.99', 1),
(35, 'Menú Queen Cheese Doble Crispy Chicken®                      ', '9.49', 1),
(36, 'Ceviche de Pescado', '14.00', 1),
(36, 'Pollo a la Brasa con Patatas Fritas, Ensalada y Salsas', '20.00', 1),
(37, 'Ceviche de Pescado', '14.00', 1),
(38, 'Director&#39;s choice de ternera', '10.95', 1),
(38, 'Cheese burger de pollo', '11.55', 1),
(38, 'Bacon & cheese fries', '10.35', 1),
(39, 'Menú King Selection - Doble Old Style Mustard Onion', '11.99', 1),
(39, 'Bacon Cheese Bites x8', '4.70', 1),
(40, 'Ceviche de Pescado', '14.00', 1),
(41, 'Menú King Selection - Doble Old Style Mustard Onion', '11.99', 1),
(41, 'Bacon Cheese Bites x8', '4.70', 1),
(41, 'Alitas de pollo x8', '4.70', 1),
(42, 'Menú King Selection - Doble Old Style Mustard Onion', '35.97', 3),
(42, 'Menú Queen Cheese Doble Crispy Chicken®                      ', '9.49', 1),
(42, 'King Aros de Cebolla® x13', '3.00', 1),
(42, 'Alitas de pollo x8', '4.70', 1),
(43, 'Menú King Selection - Doble Old Style Mustard Onion', '35.97', 3),
(44, 'Menú Queen Cheese Doble Crispy Chicken®                      ', '9.49', 1),
(44, 'Menú King Selection - Doble Old Style Mustard Onion', '23.98', 2),
(44, 'Bacon Cheese Bites x8', '4.70', 1),
(45, 'American Style Chicken Creamy Parmesan', '6.50', 1),
(46, '10 Alitas y 10 McNuggets®', '20.90', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_rest` int(10) UNSIGNED NOT NULL,
  `name_rest` text NOT NULL,
  `dir_rest` text NOT NULL,
  `tel_rest` varchar(9) NOT NULL,
  `mail_rest` text NOT NULL,
  `web_rest` text NOT NULL,
  `logo_rest` varchar(100) NOT NULL,
  `type_eat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurantes`
--

INSERT INTO `restaurantes` (`id_rest`, `name_rest`, `dir_rest`, `tel_rest`, `mail_rest`, `web_rest`, `logo_rest`, `type_eat`) VALUES
(1, 'Burger King', 'Pol. Ind. Prado Regordono, Calle Torres Quevedo, 6, 28936 Móstoles, Madrid', '916451695', 'aclinete@burgerking.com', 'https://www.burgerking.es', 'burger-king-165x165.png', 'fast-food'),
(3, 'Ginos', 'Paseo de Arroyomolinos, 33, 28938 Móstoles, Madrid', '916457400', 'acliente@ginos.es', 'https://www.ginos.es', 'ginos-165x165.png', 'italiana'),
(10, 'Mc Donalds', 'Centro Comercial Fuensanta. 550.0 metros · Centro Comercial La Fuensanta, Av. de la Onu, 65', '916467130', 'a.cliente@mcdonalds.com', 'https://mcdonalds.es', 'mcdonalds-165x165.png', 'fast-food'),
(11, 'Foster&#39;s H', 'Calle Cámara de la Industria, 2, 28938 Móstoles, Madrid', '916462458', 'a.cliente@foster.com', 'https://fostershollywood.es', 'fosters-165x165.png', 'americana'),
(12, 'Vips', 'Paseo de Arroyomolinos, 33, A ', '916477800', 'a.cliente@vips.com', 'http://www.vips.com', 'vips-165x165.png', 'fast-food'),
(13, 'Hong Kong', ' Avda Carlos V 41  28937 Mostoles Madrid ', '916460438', 'a.cliente@hongkong.com', 'https://www.hongkongmostoles.com', 'hong-kong.jpg', 'asiatica'),
(14, 'Namaste India ', 'Avinguda del Papa Luna, 19, 12598 Peníscola, Castelló', '964880173', 'hk831780@gmail.com', 'https://namasterestaurante.com', 'Namaste.png', 'india'),
(15, 'Moreno', 'Carretera Antigua de Extremadura (N-V), km. 20.300 Móstoles (Madrid)', '916467738', 'mariscosmoreno@hotmail.com', 'https://marisqueriamoreno.com', 'moreno.png', 'mediterranea'),
(16, 'TAMPU', ' Plaza Tingo María, 6, Móstoles, 28931 ', '645635514', 'a.cliente@tampu.com', '', 'tampu-restaurante-peruano.jpg', 'latinoamericana');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name_user` text NOT NULL,
  `dir_user` text NOT NULL,
  `tel_user` varchar(9) NOT NULL,
  `password_user` longtext NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `type_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `name_user`, `dir_user`, `tel_user`, `password_user`, `mail_user`, `type_user`) VALUES
(1, 'diego', 'calle de micasa n51', '916464646', '81dc9bdb52d04dc20036dbd8313ed055', 'dieger75@gmail.com', 'admin'),
(13, 'jose', 'Calle de la aventura 28', '916464657', '81dc9bdb52d04dc20036dbd8313ed055', 'jose@mail.com', 'public'),
(14, 'Carla Saiz', 'Calle academia', '913233222', '81dc9bdb52d04dc20036dbd8313ed055', 'hey@carlasaiz.com', 'admin'),
(15, 'manuel', 'calle casa', '916665656', '81dc9bdb52d04dc20036dbd8313ed055', 'manuel@mail.com', 'public'),
(20, 'pablo', 'casasas', '961535454', '81dc9bdb52d04dc20036dbd8313ed055', 'pablo3@mail.com', 'public'),
(21, 'Hugo', 'calle la casa', '936548656', '81dc9bdb52d04dc20036dbd8313ed055', 'hugo@mail.com', 'public'),
(22, 'ely', 'casa', '915465456', '81dc9bdb52d04dc20036dbd8313ed055', 'ely@mail.com', 'public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `rest_id` (`rest_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `carta-restaurantes` (`rest_id`);

--
-- Indexes for table `product_pedido`
--
ALTER TABLE `product_pedido`
  ADD KEY `pedido_id` (`pedido_id`) USING BTREE;

--
-- Indexes for table `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_rest`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_rest` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos-restaurante` FOREIGN KEY (`rest_id`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos-usuario` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `carta-restaurantes` FOREIGN KEY (`rest_id`) REFERENCES `restaurantes` (`id_rest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_pedido`
--
ALTER TABLE `product_pedido`
  ADD CONSTRAINT `pedido-producto` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
