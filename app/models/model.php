<?php
    class Model{
        protected $db;

        function __construct(){
            $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        private function deploy(){
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if (count($tables) == 0) {
                $sql =<<<END
                --
                -- Base de datos: `tienda_computacion`
                --
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `compras`
                --
                
                CREATE TABLE `compras` (
                  `ID_compra` int(11) NOT NULL,
                  `ID_usuario` int(11) NOT NULL,
                  `ID_gabinete` int(11) NOT NULL,
                  `ID_graficas` int(11) NOT NULL,
                  `ID_procesadores` int(11) NOT NULL,
                  `ID_ram` int(11) NOT NULL,
                  `Valor` int(11) NOT NULL,
                  `fecha` date NOT NULL DEFAULT current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `gabinetes`
                --
                
                CREATE TABLE `gabinetes` (
                  `ID_gabinete` int(11) NOT NULL,
                  `Marca` varchar(45) NOT NULL,
                  `Modelo` varchar(45) NOT NULL,
                  `Tamaño` varchar(45) NOT NULL,
                  `Valor` float NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `gabinetes`
                --
                
                INSERT INTO `gabinetes` (`ID_gabinete`, `Marca`, `Modelo`, `Tamaño`, `Valor`) VALUES
                (1, 'NZXT', 'H5 Flow Compact ATX', 'Mid-Tower', 85);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `graficas`
                --
                
                CREATE TABLE `graficas` (
                  `ID_graficas` int(11) NOT NULL,
                  `Marca` varchar(45) NOT NULL,
                  `Modelo` varchar(45) NOT NULL,
                  `Vram` varchar(45) NOT NULL,
                  `Valor` float NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `graficas`
                --
                
                INSERT INTO `graficas` (`ID_graficas`, `Marca`, `Modelo`, `Vram`, `Valor`) VALUES
                (10002, 'NVIDIA', 'GeForce RTX 3080', '10GB GDDR6X', 420),
                (10003, 'MSI ', 'GeForce RTX 3060', '12GB', 290);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `procesadores`
                --
                
                CREATE TABLE `procesadores` (
                  `ID_procesadores` int(11) NOT NULL,
                  `Marca` varchar(45) NOT NULL,
                  `Modelo` varchar(45) NOT NULL,
                  `Socket` varchar(45) NOT NULL,
                  `Valor` float NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `procesadores`
                --
                
                INSERT INTO `procesadores` (`ID_procesadores`, `Marca`, `Modelo`, `Socket`, `Valor`) VALUES
                (9, 'Intel', 'i7-12700KF', 'LGA 1700', 720);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `rams`
                --
                
                CREATE TABLE `rams` (
                  `ID_RAM` int(11) NOT NULL,
                  `Marca` varchar(45) NOT NULL,
                  `Tamaño` varchar(45) NOT NULL,
                  `Velocidad` varchar(45) NOT NULL,
                  `Generacion` varchar(45) NOT NULL,
                  `Valor` float NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `rams`
                --
                
                INSERT INTO `rams` (`ID_RAM`, `Marca`, `Tamaño`, `Velocidad`, `Generacion`, `Valor`) VALUES
                (1, 'Corsair Vengeance RGB Pro', '16GB (2x8GB)', '3200MHZ', 'DDR4', 50);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `usuarios`
                --
                
                CREATE TABLE `usuarios` (
                  `id_usuario` int(11) NOT NULL,
                  `email` varchar(45) NOT NULL,
                  `password` varchar(225) NOT NULL,
                  `username` varchar(45) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `usuarios`
                --
                
                INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `username`) VALUES
                (1, 'webadmin', '$2y$10$NLFFfBx0gkF3nuNLD/B1BuaTkVJ8wIr..WVphVctrv1f2R16dNSiu', ''),
                (3, 'Agustin', '$2y$10$gCMD83w1WBRS2Ur6lcLU/OmayLowSyYCoAllwXC8RUqc4jrNNmETW', '');
                
                --
                -- Índices para tablas volcadas
                --
                
                --
                -- Indices de la tabla `compras`
                --
                ALTER TABLE `compras`
                  ADD PRIMARY KEY (`ID_compra`),
                  ADD KEY `fk_compras_usuarios` (`ID_usuario`),
                  ADD KEY `fk_compras_procesadores` (`ID_procesadores`),
                  ADD KEY `fk_compras_graficas` (`ID_graficas`),
                  ADD KEY `fk_compras_rams` (`ID_ram`),
                  ADD KEY `fk_compras_gabinetes` (`ID_gabinete`);
                
                --
                -- Indices de la tabla `gabinetes`
                --
                ALTER TABLE `gabinetes`
                  ADD PRIMARY KEY (`ID_gabinete`);
                
                --
                -- Indices de la tabla `graficas`
                --
                ALTER TABLE `graficas`
                  ADD PRIMARY KEY (`ID_graficas`);
                
                --
                -- Indices de la tabla `procesadores`
                --
                ALTER TABLE `procesadores`
                  ADD PRIMARY KEY (`ID_procesadores`);
                
                --
                -- Indices de la tabla `rams`
                --
                ALTER TABLE `rams`
                  ADD PRIMARY KEY (`ID_RAM`);
                
                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                  ADD PRIMARY KEY (`id_usuario`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --
                
                --
                -- AUTO_INCREMENT de la tabla `gabinetes`
                --
                ALTER TABLE `gabinetes`
                  MODIFY `ID_gabinete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                
                --
                -- AUTO_INCREMENT de la tabla `graficas`
                --
                ALTER TABLE `graficas`
                  MODIFY `ID_graficas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;
                
                --
                -- AUTO_INCREMENT de la tabla `procesadores`
                --
                ALTER TABLE `procesadores`
                  MODIFY `ID_procesadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
                
                --
                -- AUTO_INCREMENT de la tabla `rams`
                --
                ALTER TABLE `rams`
                  MODIFY `ID_RAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                
                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
                
                --
                -- Restricciones para tablas volcadas
                --
                
                --
                -- Filtros para la tabla `compras`
                --
                ALTER TABLE `compras`
                  ADD CONSTRAINT `fk_compras_gabinetes` FOREIGN KEY (`ID_gabinete`) REFERENCES `gabinetes` (`ID_gabinete`),
                  ADD CONSTRAINT `fk_compras_graficas` FOREIGN KEY (`ID_graficas`) REFERENCES `graficas` (`ID_graficas`),
                  ADD CONSTRAINT `fk_compras_procesadores` FOREIGN KEY (`ID_procesadores`) REFERENCES `procesadores` (`ID_procesadores`),
                  ADD CONSTRAINT `fk_compras_rams` FOREIGN KEY (`ID_ram`) REFERENCES `rams` (`ID_RAM`),
                  ADD CONSTRAINT `fk_compras_usuarios` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`id_usuario`);
                COMMIT;
                
                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                END;
                $this->db->query($sql);
            }
        }
    }
?>