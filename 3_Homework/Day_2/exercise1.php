<?php

$queryRelationImages = "ALTER TABLE `images`ADD FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`) ON DELETE CASCADE";

$queryRelationUsersCompanies = "ALTER TABLE `users_companies` ADD FOREIGN KEY (`user_id`)REFERENCES `users`(`id`)ON DELETE CASCADE";