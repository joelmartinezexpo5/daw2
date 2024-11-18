INSERT INTO categorias (nombre) 
VALUES 
    ('Lácteos'),
    ('Carnes'),
    ('Frutas'),
    ('Verduras'),
    ('Electrónica');

INSERT INTO productos (codigo, precio, nombre, categoria_id)
VALUES 
    ('LA001', 1.50, 'Leche Entera', 1),
    ('LA002', 2.00, 'Queso Manchego', 1),
    ('CA001', 5.00, 'Pollo Entero', 2),
    ('FR001', 0.80, 'Manzanas', 3),
    ('VE001', 0.50, 'Zanahorias', 4),
    ('EL001', 300.00, 'Televisor', 5),
    ('EL002', 1000.00, 'Ordenador', 5);

INSERT INTO alimentaciones (producto_id, mes_caducidad, anio_caducidad)
VALUES 
    (1, 12, 2024),  -- Leche Entera
    (2, 6, 2025),   -- Queso Manchego
    (4, 9, 2023),   -- Manzanas
    (5, 11, 2023);  -- Zanahorias

INSERT INTO electronicas (producto_id, plazo_garantia)
VALUES 
    (6, 24),  -- Televisor
    (7, 36);  -- Ordenador
