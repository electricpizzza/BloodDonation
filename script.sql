

INSERT INTO `blood_requests` (`id`, `user_id`, `caravan_id`, `association_id`, `bloodType`, `city`, `address`, `description`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, 'AB+', 'Fès', 'Lycée Ibn Hazem, Avenue des Sports, Dar Dbibagh, Agdal, arrondissement d\'Agdal, Fès, Pachalik du Fes, Préfecture de Fès, Fès-Meknès, 30013, Maroc', 'bonjour š il vous plaît mon frere a fait une accident et il est en besoin du sang de type AB+ veuillez nous aider et merci', '2020-06-12 00:00:00', '2020-05-01 00:00:00', '2020-05-07 18:31:37'),
(3, 1, NULL, NULL, 'A+', 'Fès', 'Dar Dbibagh, Agdal, arrondissement d\'Agdal, Fès, Pachalik du Fes,', 'La Journée mondiale du donneur de sang est une journée internationale organisée chaque 14 juin par l\'Organisation mondiale de la', '2020-05-12 00:00:00', '2020-05-07 18:42:09', '2020-05-07 18:42:09'),
(4, 1, NULL, NULL, 'O-', 'Casablanca', 'El Mariniyine, arrondissement d\'El Mariniyine, Fès, Pachalik du Fes,', 'bonjour š il vous plaît mon frere a fait une accident et il est en besoin du sang de type AB+ veuillez nous aider et merci bonjour š il vous plaît mon frere a fait une accident et il est en besoin du sang de type AB+ veuillez nous aider et merci', '2020-05-12 00:00:00', '2020-05-07 19:01:41', '2020-05-07 19:01:41'),
(5, 3, NULL, NULL, 'O+', 'Fès', 'El Mariniyine, arrondissement d\'El Mariniyine, Fès', 'bonjour š il vous plaît mon frere a fait une accident et il est en besoin du sang de type AB+ veuillez nous aider et merci', '2020-05-08 00:00:00', '2020-05-07 19:08:36', '2020-05-07 19:08:36'),
(6, 1, NULL, NULL, 'AB-', 'meknes', 'RUE 14 HAY OUED FES RESIDENCE PARIS 41 APP2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repellendus molestias rerum, minima totam veritatis est odio cum! Nam corrupti doloribus vitae fugiat magnam perspiciatis exercitationem consequuntur culpa. Consectetur, minima.', '2020-05-01 00:00:00', '2020-05-10 13:15:14', '2020-05-10 13:15:14'),
(6, 1, NULL, NULL, 'AB-', 'meknes', 'RUE 14 HAY OUED FES RESIDENCE PARIS 41 APP2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repellendus molestias rerum, minima totam veritatis est odio cum! Nam corrupti doloribus vitae fugiat magnam perspiciatis exercitationem consequuntur culpa. Consectetur, minima.', '2020-05-01 00:00:00', '2020-05-10 13:15:14', '2020-05-10 13:15:14'),
(6, 1, NULL, NULL, 'AB-', 'meknes', 'RUE 14 HAY OUED FES RESIDENCE PARIS 41 APP2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repellendus molestias rerum, minima totam veritatis est odio cum! Nam corrupti doloribus vitae fugiat magnam perspiciatis exercitationem consequuntur culpa. Consectetur, minima.', '2020-05-01 00:00:00', '2020-05-09 13:15:14', '2020-05-09 13:15:14'),
(6, 1, NULL, NULL, 'AB-', 'meknes', 'RUE 14 HAY OUED FES RESIDENCE PARIS 41 APP2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repellendus molestias rerum, minima totam veritatis est odio cum! Nam corrupti doloribus vitae fugiat magnam perspiciatis exercitationem consequuntur culpa. Consectetur, minima.', '2020-05-01 00:00:00', '2020-05-09 13:15:14', '2020-05-09 13:15:14'),
(7, 1, NULL, NULL, 'O-', 'Fes', 'RUE 14 HAY OUED FES RESIDENCE PARIS 41 APP2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repellendus molestias rerum, minima totam veritatis est odio cum! Nam corrupti doloribus vitae fugiat magnam perspiciatis exercitationem consequuntur culpa. Consectetur, minima.', '2020-05-01 00:00:00', '2020-05-10 13:15:49', '2020-05-10 13:15:49');

-- --------------------------------------------------------


INSERT INTO `caravans` (`id`, `user_id`, `currentPosition`, `latestPosition`, `city`, `staringTime`, `endingTime`, `created_at`, `updated_at`) VALUES
(1, 2, 'fes', 'fes', 'fes', '08:30', '16:00', '2020-05-07 00:00:00', '2020-05-07 00:00:00');



INSERT INTO `events` (`id`, `caravan_id`, `association_id`, `title`, `description`, `city`, `address`, `dateEnd`, `dateStart`, `startsAt`, `endsAt`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'journée mondiale de don du sang', 'La Journée mondiale du donneur de sang est une journée internationale organisée chaque 14 juin par l\'Organisation mondiale de la ', 'fes', 'av chefchaouni ville nouvelle', '2020-05-15', '2020-05-12', '10:00:00', '19:00:00', '2020-05-07 00:00:00', '2020-05-07 00:00:00');

--

INSERT INTO `posts` (`id`, `caravan_id`, `association_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'La Journée mondiale du donneur de sang est ', 'La Journée mondiale du donneur de sang est une journée internationale organisée chaque 14 juin par l\'Organisation mondiale de la santé. Elle est consacrée à la promotion et la sensibilisation du don de sang et du s.', 'https://dondesang.efs.sante.fr/sites/default/files/styles/custom_795x425/public/2018-04/Jmds_2018_795x425.png?itok=KGQD5p6x', '2020-05-05 00:00:00', '2020-05-15 00:00:00');
(1, 1, NULL, 'La Journée mondiale du donneur de sang est ', 'La Journée mondiale du donneur de sang est une journée internationale organisée chaque 14 juin par l\'Organisation mondiale de la santé. Elle est consacrée à la promotion et la sensibilisation du don de sang et du s.', 'https://www.raktsahayata.com/upload/blogs/adp-gallery5e64c0c980af1.jpg', '2020-05-05 00:00:00', '2020-05-10 00:00:00');

-- --
INSERT INTO `users` (`id`, `name`, `email`, `curentCity`, `bloodType`, `city`, `roll`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hamid dawsi', 'hamid@mail.com', 'undefined', NULL, 'fes', 'user', NULL, '$2y$10$XD6hEoj20MA7mvCjtKa3HOOPQDmson1tZanb0uO8T9GWTux6m/ejS', NULL, '2020-05-07 18:22:41', '2020-05-07 18:22:41'),
(2, 'zakariae dinar', 'dinar@mail.com', 'undefined', NULL, 'fes', 'user', NULL, '$2y$10$gPpxKdhqB7T/bQ7kZsxdDuPpIgZLD1Pep/GlxHE7SOHgmcvrH7bvO', NULL, '2020-05-07 18:23:29', '2020-05-07 18:23:29'),
(3, 'amine rachidi', 'amine@mail.com', 'undefined', NULL, 'fes', 'user', NULL, '$2y$10$gPpxKdhqB7T/bQ7kZsxdDuPpIgZLD1Pep/GlxHE7SOHgmcvrH7bvO', NULL, '2020-05-07 19:07:11', '2020-05-07 19:07:11');

--