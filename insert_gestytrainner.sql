INSERT INTO gestytrainner.categories (title, descripcion, image, created_at, updated_at) VALUES ('Pilates', '<p>desc categoría pilates</p>', '1589278729.jpeg', '2020-05-12 10:18:49', '2020-05-12 10:18:49');
INSERT INTO gestytrainner.categories (title, descripcion, image, created_at, updated_at) VALUES ('Ciclo Indoor', '<p>desc categoría ciclo indoor</p>', '1589280749.jpeg', '2020-05-12 10:30:11', '2020-05-12 10:52:29');
INSERT INTO gestytrainner.categories (title, descripcion, image, created_at, updated_at) VALUES ('Yoga', '<p>desc categoría yoga</p>', '1589279487.jpeg', '2020-05-12 10:31:27', '2020-05-12 10:31:27');
INSERT INTO gestytrainner.categories (title, descripcion, image, created_at, updated_at) VALUES ('Body Pump', '<p>Descripción de categoría de body pump</p>', '1589281057.jpeg', '2020-05-12 10:57:37', '2020-05-12 10:57:37');
INSERT INTO gestytrainner.categories (title, descripcion, image, created_at, updated_at) VALUES ('Crossfit', '<p>desc crossfit</p>', '1590955513.jpeg', '2020-05-31 20:05:13', '2020-05-31 20:05:13');

INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_04_27_180012_create_posts_table', 1);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_03_075859_create_calendarios_table', 1);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_05_094338_create_clase_images_table', 2);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2014_05_04_113205_create_rols_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2019_08_19_000000_create_failed_jobs_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_04_23_181516_create_categories_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_04_24_081746_create_clases_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_12_093014_create_post_comments_table', 3);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_12_134603_create_contacts_table', 4);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2019_05_03_000001_create_customer_columns', 5);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2019_05_03_000002_create_subscriptions_table', 5);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2019_05_03_000003_create_subscription_items_table', 5);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_18_103758_create_clase_user_table', 6);
INSERT INTO gestytrainner.migrations (migration, batch) VALUES ('2020_05_20_091127_create_clase_user_table', 7);

INSERT INTO gestytrainner.rols (`key`, name, description, created_at, updated_at) VALUES ('admin', 'Rol de admin', 'Informacion rol de admin', '2020-05-12 11:41:12', '2020-05-12 11:41:16');
INSERT INTO gestytrainner.rols (`key`, name, description, created_at, updated_at) VALUES ('regular', 'Rol de regular', 'Informacion rol de regular', '2020-05-12 11:41:39', '2020-05-12 11:41:42');

INSERT INTO gestytrainner.subscription_items (subscription_id, stripe_id, stripe_plan, quantity, created_at, updated_at) VALUES (1, 'si_HHN1j8aWbuu8KB', 'plan_HHMyN4CNGnPzV4', 1, '2020-05-14 21:07:59', '2020-05-14 21:07:59');

INSERT INTO gestytrainner.subscriptions (user_id, name, stripe_id, stripe_status, stripe_plan, quantity, trial_ends_at, ends_at, created_at, updated_at) VALUES (2, 'default', 'sub_HHN1OJ1qt5UmVi', 'active', 'plan_HHMyN4CNGnPzV4', 1, null, null, '2020-05-14 21:07:59', '2020-05-14 21:07:59');

INSERT INTO gestytrainner.users (name, email, email_verified_at, password, remember_token, created_at, updated_at, rol_id, stripe_id, card_brand, card_last_four, trial_ends_at) VALUES ('Javier', 'admin@gmail.com', null, '$2y$10$GKNdMlMByIWGdGm0bR7AT.1OsERw5yrEdfOUbpoKaHLpMTRdX8rzq', null, '2020-05-12 09:43:53', '2020-05-15 19:02:02', 1, null, null, null, null);
INSERT INTO gestytrainner.users (name, email, email_verified_at, password, remember_token, created_at, updated_at, rol_id, stripe_id, card_brand, card_last_four, trial_ends_at) VALUES ('Vanesa', 'regular@gmail.com', null, '$2y$10$q/JQXhj3/BVs/W8pQeY1WeWfX1scoUTK9nIs9jYGqOGnEG7h5rXPW', null, '2020-05-12 09:45:20', '2020-05-15 18:24:56', 2, 'cus_HHKt5xAxdxF5eE', null, null, null);
INSERT INTO gestytrainner.users (name, email, email_verified_at, password, remember_token, created_at, updated_at, rol_id, stripe_id, card_brand, card_last_four, trial_ends_at) VALUES ('Daniel', 'daniel@gmail.com', null, '$2y$10$8Ehzq7F2vW9GwVTd3FEY6.XHDEbdKjb.CJYlqg9ZtK73nb6kTsYIK', null, '2020-05-16 19:44:35', '2020-05-16 19:44:35', 2, null, null, null, null);
INSERT INTO gestytrainner.users (name, email, email_verified_at, password, remember_token, created_at, updated_at, rol_id, stripe_id, card_brand, card_last_four, trial_ends_at) VALUES ('José', 'joseag@hotmail.com', null, '$2y$10$JK3h26SSkVhoyFz1vm9rJe4Kh/RDLpqY1CZArPd2OEndHKaN77D3G', null, '2020-05-16 21:28:17', '2020-05-16 21:28:17', 1, null, null, null, null);

INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Tu primera clase para iniciarte al yoga', '<p>Esta es una clase básica de hatha yoga para familiarizarte con las asanas (posturas).<br>&nbsp;</p><p>“Tu primera clase de yoga ” es una práctica suave de 25 min de yoga donde podrás conocer y practicar muchas de las principales asanas del hatha yoga y hacerte una idea de lo que es una clase de yoga. Está recomendado para cualquier persona que quiera descubrir y iniciarse al yoga.&nbsp;</p>', '1590945794.jpeg', '11:11', 'no', '#00fdff', '#000000', '2020-05-12 00:00:00', '2020-05-12 00:00:00', null, '2020-05-31 17:23:14', 3, 11, 4);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Clase ciclo indoor quema grasa', '<p>Entrenamiento de fondo o quemagrasas, el objetivo de esta clase es estar entre el 65 y 75% de tu frecuencia cardíaca, y este es el principal objetivo no tanto los ejercicios o las cargas si no lo que diga tu corazón, estas clase te permetirá ganar una base de fondo para futuras clases de ciclo y también podría ser una recuperación activa. Te sugiero que si hace falta para cumplir el objetivo si pone de pie te quedes sentado o si pone carga media pongas menos o mas según la zona cardíaca en la que estes.</p>', '1590946155.jpeg', '12:12', 'si', '#ff9300', '#000000', '2020-05-14 00:00:00', '2020-05-14 00:00:00', null, '2020-05-31 17:29:15', 2, 15, 4);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Entrenamiento con barra y discos', '<p>Es el original body pump, la clase con barra y discos que fortalece y tonifica todo el cuerpo. En esta sesión, de 60 minutos trabajas los principales grupos musculares utilizando los mejores ejercicios de la sala de fitness, como por ejemplo, squats, presses, elevaciones y curls. Diez tracks con buena música, fantásticos instructores y tu propia selección de peso, te motivarán a conseguir los resultados que buscas ¡y rápido!</p>', '1590952929.jpeg', '12:12', 'no', '#ff2600', '#000000', '2020-05-16 00:00:00', '2020-05-16 00:00:00', null, '2020-05-31 19:22:09', 4, 14, 3);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Pilates para principiantes', '<p>El programa que diseñó está enfocado en lograr una completa armonía y hacer que podamos desarrollar cualquier actividad de nuestra vida diaria con energía y sin riesgo de que las malas posturas, los movimientos repetitivos o incorrectos nos causen dolencias o lesiones a corto, medio o largo plazo. Los tres objetivos claros al realizar estos ejercicios son conseguir un aumento de fuerza, conseguir un aumento de flexibilidad y mejorar la postura.</p>', '1590949168.jpeg', '13:13', 'no', '#00fdff', '#000000', '2020-05-17 00:00:00', '2020-05-17 00:00:00', null, '2020-05-31 18:19:28', 1, 11, 3);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Crossfit WOD a alta intensidad', '<p>Resistencia, fuerza física, flexibilidad, potencia, equilibrio… ¿Todo en uno? Si buscas un deporte que te ayude a conseguir esto y más, apúntate al CrossFit, un entrenamiento funcional a alta intensidad.</p><p>&nbsp;</p><p>sesión de <strong>CrossFit</strong>, “donde cada día, el entrenamiento programado será diferente del día anterior”. La variedad y la lucha contra el aburrimiento es una de las máximas de esta modalidad deportiva, por lo que es importante que cada sesión sea diferente: “las clases son intensas, pero la variedad en los ejercicios y el componente grupal añaden el compañerismo y el toque de competitividad”.</p>', '1590956082.jpeg', '12:34', 'no', '#0433ff', '#000000', '2020-05-18 00:00:00', '2020-05-18 00:00:00', null, '2020-05-31 20:14:42', 6, 24, 1);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Fuerza y tonificación', '<p>El <strong>Body Pump</strong> es un sistema de entrenamiento en grupo estandarizado basado en el trabajo con pesas a través de <strong>repeticiones negativas</strong>, que nos ayudan a ganar fuerza muscular, y <strong>superseries</strong>, para entrenar el corazón y preagotar al músculo.</p><p>En esta clase se realiza un trabajo de <strong>fuerza</strong> y <strong>tonificación</strong> de una hora en la que a lo largo de diez tracks musicales se entrenan los principales grupos musculares, siempre en el mismo orden y con una variación no muy amplia de ejercicios. Es un entrenamiento bastante completo, ya que se trabaja a nivel aeróbico, con muy poco descanso entre ejercicios, se gana fuerza y se modela el cuerpo.</p>', '1590953565.jpeg', '11:11', 'no', '#fffb00', '#000000', '2020-05-14 00:00:00', '2020-05-14 00:00:00', null, '2020-05-31 19:32:45', 4, 21, 1);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Clase ciclo indoor cambios de ritmo', '<p>La sesión que te propongo hoy consta de tres bloques, muy diferentes entre los tres. El primer bloque dura unos 15 min, se trata de calentar bien durante los 8 o 9 primeros minutos y comenzar un ascenso de montaña, empezarás a velocidad de 88 e irá bajando progresivamente a la vez que tu carga irá en aumento. El segundo bloque es el que le da nombre a la clase, pones una carga media, comienzas a cadencia de 64 y pasas a 88, de 64 mientras descansas a 92, 64 a 100, 64 a 105 y 64 a 110, al repasar la gráfica antes de subir me dí cuenta que algunas velocidades las indica mal, tu simplemente llévate por la cadencia de la música, este bloque dura unos 20 min. El tercer bloque se trata nuevamente con carga media una progresión de velocidad de 64 a 110 ppm(pedaladas por minuto) una duración de 13 min.</p>', '1590949285.jpeg', '11:11', 'no', '#aa7942', '#000000', '2020-05-19 00:00:00', '2020-05-19 00:00:00', null, '2020-05-31 18:21:25', 2, 12, 1);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Clase suave de Hatha flow yoga', '<p>Clase de 30 mins de Hatha yoga suave para principiantes para aprender a fluir conscientemente</p><p>En esta clase de 30 min podrás disfrutar de una práctica fluida y familiarizarte con muchas de las asanas básicas del Hatha Yoga.&nbsp;Está recomendada para todos aquellos que quieran realizar una sesión de yoga dinámica y suave.</p>', '1590956223.jpeg', '15:15', 'si', '#ff2600', '#000000', '2020-05-20 00:00:00', '2020-05-20 00:00:00', '2020-05-20 12:52:42', '2020-05-31 20:17:03', 3, 10, 1);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Clase técnicas pilates', '<p>Para experimentar los beneficios que ofrece este método de acondicionamiento físico, resulta imprescindible ser consciente de los principios básicos que el pilates establece para su práctica:&nbsp;&nbsp;</p><p>Concentración: Durante la realización de los ejercicios es clave concentrase en el área del cuerpo que se está trabajando y poner atención en sentir la actividad que se está desarrollando&nbsp;</p><p>Respiración: Una buena respiración ayuda a controlar los movimientos y facilita la estabilización y la movilización de la columna vertebral y las extremidades. Por regla general, se inhalará para prepararse para un movimiento y se exhalará mientras se ejecuta.</p>', '1590949564.jpeg', '13:11', 'no', '#ff40ff', '#000000', '2020-05-21 00:00:00', '2020-05-23 00:00:00', null, '2020-05-31 18:26:04', 1, 7, 1);
INSERT INTO gestytrainner.clases (title, descripcion, image, hora, posted, color, textcolor, start, end, created_at, updated_at, category_id, precio, user_id) VALUES ('Crossfit para principiantes', '<p>Normalmente, las <strong>clases de CrossFit</strong>, que duran unos 50-55 minutos, se realizan bajo la supervisión de un entrenador que controla a un grupo formado por no más de 15 personas. El entrenador debe estar titulado a fin de estar capacitado para supervisar cada uno de los ejercicios. Además, el monitor marcará, dirigirá, corregirá y escalará el entrenamiento, si es necesario, y ayudará a registrar los tiempos y las marcas que cada participante vaya alcanzando para poder seguir su evolución.</p>', '1590956167.jpeg', '11:11', 'no', '#942192', '#000000', '2020-05-20 00:00:00', '2020-05-21 00:00:00', '2020-05-20 14:31:18', '2020-05-31 20:16:07', 6, 12, 1);

INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('¿Cómo mejorar?', '<p>Soy nuevo en esto del yoga, pero la clase me pareció impresionante y tengo intención de seguir con el yoga, alguien me puede decir como puedo mejorar. Gracias!&nbsp;</p>', '0', '2020-06-01 17:40:31', '2020-06-01 17:40:31', 1, 3);
INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('Clase motivante', '<p>Que pasada de clase la del otro día, me gustó por la forma de guiar la clase del monitor.</p>', '0', '2020-06-01 17:43:32', '2020-06-01 17:43:32', 2, 3);
INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('Gran masterclass', '<p>El otro día realicé una esta masterclass y me lo pasé en grande, no sabía que a tanta gente le gustara el body pump.</p><p>Genial!</p>', '0', '2020-06-01 17:47:23', '2020-06-01 17:47:23', 3, 3);
INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('Me gusta el yoga', '<p>Después de realizar esta clase, me he dado cuenta que me gusta el yoga y me relaja.</p><p>Bien!</p>', '0', '2020-06-01 18:12:41', '2020-06-01 18:12:41', 1, 2);
INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('Pasión', '<p>Al realizar esta masterclass me he dado cuenta de mi pasión por el ciclo indoor. He salido super motivada de esta clase.</p><p>Saludos!</p>', '0', '2020-06-01 18:14:18', '2020-06-01 18:14:18', 2, 2);
INSERT INTO gestytrainner.post_comments (title, message, approved, created_at, updated_at, clase_id, user_id) VALUES ('Reconfortante', '<p>Esta clase ha conseguido quitarme os dolores de lumbares y las articulaciones de las rodillas, se la recomiendo a todo el mundo que tenga problemas de espalda.</p><p>Saludos!&nbsp;</p>', '0', '2020-06-01 18:16:45', '2020-06-01 18:16:45', 4, 2);

INSERT INTO gestytrainner.contacts (name, email, phone, message, created_at, updated_at, user_id, admin_id) VALUES ('Daniel', 'daniel@gmail.com', 829364856, 'Hola, me encanta como das las clases y me gustaría saber si impartes clases de otras disciplinas.
Saludos!', '2020-06-01 17:34:34', '2020-06-01 17:34:34', 2, 1);
INSERT INTO gestytrainner.contacts (name, email, phone, message, created_at, updated_at, user_id, admin_id) VALUES ('Daniel', 'daniel@gmail.com', 192837453, 'Hola, es posible realizar los ejercicios de clase en casa o cuando voy de viaje?
Saludos!', '2020-06-01 17:36:34', '2020-06-01 17:36:34', 2, 4);
INSERT INTO gestytrainner.contacts (name, email, phone, message, created_at, updated_at, user_id, admin_id) VALUES ('Vanesa', 'regular@gmail.com', 638465934, 'Hola, estoy de viaje y me gustaría saber las próximas fechas de tus clases para poder apuntarme.

Gracias!', '2020-06-01 18:27:12', '2020-06-01 18:27:12', 2, 1);
INSERT INTO gestytrainner.contacts (name, email, phone, message, created_at, updated_at, user_id, admin_id) VALUES ('Vanesa', 'regular@gmail.com', 630482739, 'Hola, que equipamiento me recomiendas para tus clases de ciclo indoor. Es que tengo que renovarlo y no se cual sería mejor.

Gracias!', '2020-06-01 18:31:26', '2020-06-01 18:31:26', 2, 4);

INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (1, 3);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (2, 4);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (2, 2);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (4, 2);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (7, 2);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (1, 2);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (2, 1);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (3, 1);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (4, 1);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (2, 3);
INSERT INTO gestytrainner.clase_user (clase_id, user_id) VALUES (3, 3);
