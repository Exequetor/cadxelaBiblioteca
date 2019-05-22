DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_adeudos` ()  BEGIN
  DECLARE done INT DEFAULT FALSE;
  DECLARE p_id_libro INT;
  DECLARE p_matricula_estudiante CHAR(10);
  DECLARE cursorForAdeudos CURSOR FOR SELECT id_libro, matricula_estudiante FROM prestamos WHERE DATEDIFF(NOW(), fecha_devolucion) > 0;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
  
  OPEN cursorForAdeudos;
  read_loop: LOOP
    FETCH cursorForAdeudos INTO p_id_libro, p_matricula_estudiante;
    if not exists (select id_adeudo from adeudos where matricula_estudiante = p_matricula_estudiante AND id_libro = p_id_libro)
	then
    	INSERT INTO adeudos(matricula_estudiante, id_libro, descripcion, fecha_adeudo, estado) VALUES(p_matricula_estudiante, p_id_libro, "Adeudo por atraso en la entrega", NOW(), 1);
	end if;
    IF done THEN
      LEAVE read_loop;
    END IF;
      END LOOP;
  CLOSE cursorForAdeudos;
END$$

DELIMITER ;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `insertion_event` ON SCHEDULE AT '2019-05-22 17:21:53' ON COMPLETION NOT PRESERVE ENABLE DO CALL insertar_adeudos()$$

DELIMITER ;