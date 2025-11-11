-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 01:06 PM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alzipetshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` enum('Makanan','Peralatan','Aksesoris','Kesehatan','Kebersihan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `satuan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`, `satuan`, `stock`) VALUES
(1, 'Bolt 800 Gram', 'Bolt Premium Cat Food is the best choice to meet your cat\'s daily nutritional needs. Enriched with a complete and balanced formula, Bolt is designed to maintain your cat\'s health, from a shiny coat to optimal energy every day.\r\n\r\nProduct Advantages:\r\n\r\nHigh-Quality Protein: Helps support strong muscle growth and overall body health.\r\nOmega 3 & 6: Enhances coat shine and keeps the skin healthy.\r\nNatural Fiber: Supports a healthy digestive system and helps prevent hairballs.\r\nComplete Vitamins & Minerals: Boosts your cat\'s immune system and vitality.\r\nDelicious Taste: Loved by cats, making mealtime a joyful moment.\r\n\r\nAvailable in Various Flavors:\r\n\r\nChicken\r\nSalmon\r\nTuna\r\nBeef\r\n\r\nPractical Packaging:\r\nBolt comes in various sizes (500g, 1kg, and 5kg) to suit your needs, whether for a single household cat or multiple cats.\r\n\r\nWith Bolt Premium Cat Food, make sure your beloved cat gets the best nutrition for a healthy, happy, and active life every day. 🌟\r\n\r\n\"Bolt, the smart choice for a healthy and happy cat!\"', 20000, './imgs/bolt.webp', 'Makanan', 'bungkus', 17),
(2, 'Lezato 1KG', 'Lezato Cat Food is the perfect solution for your cat\'s daily nutritional needs. Made with high-quality ingredients, Lezato ensures every bite is filled with the goodness needed for your cat\'s health and happiness.\r\n\r\nProduct Advantages:\r\n\r\nRich in Protein: Supports strong muscle growth and provides optimal energy.\r\nOmega Fatty Acids: Helps maintain a thick, shiny coat and healthy skin.\r\nNatural Fiber: Improves digestion and helps prevent hairball problems.\r\nCat-Approved Taste: With an enticing aroma and flavor, your cat will enjoy every meal.\r\nComplete Vitamins and Minerals: Supports the immune system and internal organ health.\r\n\r\nIrresistible Flavor Choices:\r\n\r\nOcean Fish\r\nFree-Range Chicken\r\nFresh Tuna\r\n\r\nAvailable Packaging:\r\nLezato comes in various package sizes (1kg, 3kg, and 10kg), suitable for single-cat households or owners with multiple cats.\r\n\r\nWith Lezato Cat Food, give your beloved cat the best care with nutritious food and delicious taste they will love.\r\n\r\n\"Lezato, a tasty solution for a healthy and active cat every day!\" 🐾', 22000, './imgs/lezato.webp', 'Makanan', 'bungkus', 11),
(3, 'Ori Cat 1KG', 'Ori Cat Food is the perfect choice for cat owners looking for high-quality food at an affordable price. Specially formulated to support your cat’s nutritional needs, Ori Cat ensures every bite provides balanced nutrition for their health and happiness.\r\n\r\nProduct Advantages:\r\n\r\nHigh-Quality Protein: Supports growth and maintains muscle health.\r\nLow-Fat Formula: Helps maintain an ideal weight and prevent obesity.\r\nNatural Fiber Content: Aids digestion and reduces hairballs.\r\nCat-Approved Taste: Tempting aroma and flavor, perfect for picky eaters.\r\nEnriched with Vitamins and Minerals: Supports immune system health and strong teeth.\r\n\r\nAvailable Flavors:\r\n\r\nGrilled Chicken\r\nTuna Fish\r\nBeef\r\n\r\nPackaging Options:\r\nOri Cat is available in various package sizes (500g, 1kg, and 5kg) to suit your needs.\r\n\r\nGive your cat the best love and care with Ori Cat Food — delicious, nutritious, and suitable for all types of cats, both kittens and adults.\r\n\r\n\"Ori Cat, the smart choice for a healthy and happy cat every day!\" 🐾', 18000, './imgs/oricat.webp', 'Makanan', 'bungkus', 16),
(4, 'Cat Choise Kitten 1KG', 'Cat Choice Food is a premium cat food designed to fully meet your cat\'s nutritional needs. Made with selected ingredients and a special formula, Cat Choice ensures your cat stays healthy, active, and happy.\r\n\r\nProduct Advantages:\r\n\r\nRich in High-Quality Protein: Helps support muscle growth and overall cat health.\r\nOmega 3 & 6: Maintains healthy skin and a soft, shiny coat.\r\nNatural Fiber: Helps reduce hairballs and supports healthy digestion.\r\nEnriched with Taurine: Supports eye and heart health.\r\nDelicious Taste Cats Love: Makes mealtime something to look forward to.\r\n\r\nAvailable Flavor Variants:\r\n\r\nChicken\r\nSalmon Fish\r\nRabbit Meat\r\n\r\nPractical Packaging:\r\nCat Choice comes in various sizes (500g, 1kg, and 3kg) suitable for daily use or long-term storage.\r\n\r\nSuitable For:\r\n\r\nAll types of cats — kittens, adults, and seniors.\r\nOwners who want to provide high-quality nutrition without overspending.\r\n\r\n\"Cat Choice, because your cat deserves the best choice!\" 🐱', 25000, './imgs/catchoise.webp', 'Makanan', 'bungkus', 20),
(7, 'Cat Cage', 'The Multifunctional Cat Cage is a practical solution to ensure the comfort and safety of your beloved cat. Designed with high-quality materials and modern features, this cage is suitable for both indoor and outdoor use. Available in various sizes to meet the needs of your cat, whether a kitten or an adult.\r\n\r\nProduct Advantages:\r\n\r\nDurable Materials: Made from rust-resistant iron or thick plastic that’s easy to clean.\r\nSafe Design: The spacing between bars is designed to prevent your cat from getting stuck.\r\nMaximum Ventilation: Provides excellent airflow for your cat’s comfort.\r\nDouble Doors with Safety Locks: Offers easy access while keeping your cat secure.\r\nRemovable Bottom Tray: Makes cleaning waste easier.\r\nFoldable Feature: Easy to store and carry during travel.\r\n\r\nAvailable Sizes:\r\n\r\nSmall (60x40x40 cm): Suitable for kittens or small cats.\r\nMedium (90x60x60 cm): Ideal for one or two adult cats.\r\nLarge (120x90x90 cm): For large cats or as a multi-level cage.\r\n\r\nOptional Features:\r\n\r\nMulti-Level Design: Comes with ladders and platforms for playtime.\r\nRotating Wheels: Makes moving the cage effortless.\r\nCover Curtain: Provides privacy and protects your cat from wind or direct sunlight.\r\n\r\nSuitable For:\r\n\r\nTemporary housing, travel, or isolation when your cat is sick.\r\nCat owners who prioritize cleanliness and pet safety.\r\n\r\n\"A comfortable and secure cat cage — peace of mind for you, happiness for your beloved cat.\" 🐾', 170000, './imgs/kandang.webp', 'Peralatan', 'buah', 0),
(14, 'Cat Litter Scoop', 'The Practical Cat Litter Scoop is an essential tool for maintaining the cleanliness of your cat’s litter box. Specially designed with the right shape and size, it helps you filter waste easily while saving cat litter.\r\n\r\nProduct Advantages:\r\n\r\nDurable Material: Made from thick plastic or high-quality metal, making it resistant to breaking or bending.\r\nErgonomic Design: Comfortable handle for easy grip, making litter box cleaning effortless.\r\nOptimal Sifting: Perfectly sized holes to separate waste from clean litter.\r\nEasy to Clean: Non-stick surface prevents odor and residue buildup.\r\nLightweight and Practical: Ideal for home use or when traveling.\r\n\r\nAvailable Variants:\r\n\r\nStandard Scoop: Medium size for small or medium litter boxes.\r\nLarge Scoop: Suitable for large litter boxes or multiple-cat households.\r\nScoop with Waste Container: Equipped with a waste bin for easier disposal.\r\n\r\nBenefits:\r\n\r\nHelps keep the litter box clean quickly and efficiently.\r\nMinimizes litter waste.\r\nPrevents unpleasant odors around the litter box area.\r\n\r\nSuitable For:\r\n\r\nAll types of cat litter, including clumping, crystal, or biodegradable litter.\r\n\r\n\"Clean the litter box easily and quickly — because cleanliness is the key to your cat’s comfort!\" 🐾', 6000, './imgs/sekop.webp', 'Peralatan', 'buah', 7),
(15, 'Cat Litter Box', 'The Premium Cat Litter Box is an essential accessory to maintain your cat’s cleanliness and comfort during their daily needs. Designed with high-quality materials and a functional design, this product is suitable for all types of cats and various kinds of litter.\r\n\r\nProduct Advantages:\r\n\r\nHigh-Quality Material: Made from thick, durable plastic that is crack-resistant and safe for cats.\r\nErgonomic Design:\r\nLow edges make it easy for cats to enter and exit.\r\nSome models come with covers to reduce odor and litter spread.\r\nLeak-Proof: The waterproof base keeps your floor clean and dry.\r\nEasy to Clean: Smooth surface allows for quick and effortless washing.\r\nAvailable in Various Sizes:\r\nSmall size for kittens or limited spaces.\r\nLarge size for adult or multi-cat households.\r\n\r\nAvailable Variants:\r\n\r\nOpen Litter Box: Ideal for cats that prefer an open space.\r\nCovered Litter Box: Equipped with a flap door for privacy and odor control.\r\nAutomatic Litter Box: Features an automatic filtering system for maximum cleanliness.\r\n\r\nBenefits:\r\n\r\nProvides optimal comfort for cats when using the litter box.\r\nMaintains cleanliness in your home environment.\r\nMinimizes odor and litter spread around the litter area.\r\n\r\n“Give your cat the best litter box — because their comfort is your top priority!” 🐾', 15000, './imgs/wadahpasir.webp', 'Peralatan', 'buah', 9),
(16, 'Cat Collar', 'The Fashionable Cat Collar is a cute yet functional accessory designed to enhance your cat’s appearance. Available in a variety of stylish designs and attractive colors, this collar also provides an added layer of identification for your beloved pet.\r\n\r\nProduct Advantages:\r\n\r\nHigh-Quality Material:\r\nMade from soft materials such as nylon, synthetic leather, or cotton fabric that are comfortable and non-irritating to your cat’s neck.\r\nEquipped with a secure buckle that is easy to attach and remove.\r\n\r\nAttractive Design:\r\nAvailable in various patterns — plain, striped, floral, or cute character designs.\r\nComes with a small bell to help you locate your cat easily.\r\n\r\nAdjustable Size:\r\nCan be adjusted to fit your cat’s neck size, suitable for all breeds — from kittens to adults.\r\n\r\nAdditional Features:\r\nSome models include a tag slot for adding your cat’s name or the owner’s phone number.\r\nReflective options are available to ensure your cat remains visible at night.\r\n\r\nLightweight and Safe:\r\nLightweight design keeps your cat comfortable while playing.\r\nQuick-release buckle prevents your cat from getting trapped if the collar gets caught.', 5000, './imgs/kalung.webp', 'Aksesoris', 'buah', 24),
(17, 'Cat Flu Medicine', 'Cat Flu Medicine is a specialized solution designed to help treat flu in your beloved cat. Developed by veterinary health experts, this medicine is formulated to relieve flu symptoms such as sneezing, nasal congestion, and fatigue, while also boosting your cat’s immune system.\r\n\r\nProduct Advantages:\r\n\r\nSpecial Formula:\r\nContains safe active ingredients for cats, such as vitamin C, herbal extracts, and immune boosters.\r\nFree from harmful substances and non-addictive.\r\n\r\nRelieves Flu Symptoms:\r\nHelps reduce sneezing, runny nose, watery eyes, and fever.\r\nEffectively speeds up recovery for cats affected by the flu.\r\n\r\nBoosts Immunity:\r\nEnriched with additional nutrients to strengthen the immune system.\r\nHelps prevent recurring flu.\r\n\r\nEasy to Use:\r\nAvailable in liquid syrup form, easy to mix with food or drinking water.\r\nSome variants also come in small tablets that are easy to swallow.\r\n\r\nSafe for All Ages:\r\nSuitable for both kittens and adult cats.\r\n\r\nUsage Instructions:\r\nGeneral Dosage:\r\nFollow the veterinarian’s advice or instructions on the package (based on your cat’s weight).\r\nHow to Administer:\r\nMix with food or give directly using a syringe/dropper.\r\nEnsure your cat drinks enough water during the treatment period.\r\n\r\nImportant Notes:\r\nConsult your veterinarian before use if your cat has allergies or is taking other medications.\r\nFor mild flu treatment only. If symptoms persist or worsen within 2–3 days, take your cat to the vet immediately.\r\n\r\n“Help your beloved cat recover quickly and stay healthy with the best care!” 🐾', 15000, './imgs/flu.webp', 'Kesehatan', 'botol', 2),
(18, 'Cat Cough Medicine', 'Cat Cough Medicine is a safe and effective solution to help relieve coughing in your beloved cat. Specially formulated, this medicine helps soothe coughs caused by mild infections, throat irritation, or allergies, while also supporting your cat’s respiratory health.\r\n\r\nProduct Advantages:\r\n\r\nSafe and Effective Formula:\r\nContains natural herbal ingredients such as honey extract, licorice, and ginger.\r\nFree from harsh chemicals that may be harmful to cats.\r\n\r\nQuick Cough Relief:\r\nHelps reduce coughing frequency and soothes throat irritation.\r\nEffective for both wet and dry coughs.\r\n\r\nSupports Respiratory Health:\r\nContains vitamins and antioxidants to maintain a healthy respiratory system.\r\n\r\nEasy to Use:\r\nAvailable in cat-friendly liquid syrup form with a natural honey flavor.\r\nSome variants also come in chewable tablets or powder that can be easily mixed with food.\r\n\r\nSuitable for All Ages:\r\nSafe for kittens, adult cats, and senior cats.\r\n\r\nUsage Instructions:\r\nGeneral Dosage:\r\nFollow your veterinarian’s advice or the instructions on the package (usually based on your cat’s weight).\r\nHow to Administer:\r\nGive directly using a syringe/dropper or mix into wet food.\r\nEnsure your cat stays well-hydrated during treatment.\r\n\r\nImportant Notes:\r\nThis medicine is intended for mild or temporary coughs.\r\nIf the cough is accompanied by symptoms such as fever, fatigue, or difficulty breathing, consult a veterinarian immediately.\r\nStore in a cool place and keep out of reach of children.\r\n\r\n“Help your cat breathe easily and comfortably with the best care!” 🐾', 15000, './imgs/batuk.webp', 'Kesehatan', 'botol', 4),
(19, 'Cat Litter', 'High-Quality Cat Litter is designed to meet the needs of both cats and their owners by providing a practical and hygienic solution for managing cat waste. Available in various types and sizes, this cat litter offers extra comfort for your beloved feline.\r\n\r\nProduct Advantages:\r\n\r\nHigh Absorption Power:\r\nEffectively absorbs liquid and reduces unpleasant odors.\r\nKeeps the litter area dry and comfortable for your cat.\r\n\r\nOptimal Odor Control:\r\nContains deodorizing technology or natural ingredients to neutralize odors.\r\nPerfect for use in enclosed spaces.\r\n\r\nMaterial Options:\r\nBentonite Litter: Strong clumping, easy to clean.\r\nSilica Crystal Litter: Super lightweight, long-lasting, and economical.\r\nOrganic (Tofu) Litter: Eco-friendly, made from natural ingredients such as soybeans.\r\nZeolite Litter: Budget-friendly and effective in odor reduction.\r\n\r\nSafe for Cats:\r\nDust-free, making it safe for your cat’s respiratory health.\r\nFree from harmful chemicals.\r\n\r\nEasy to Use:\r\nClumps are easy to remove — no need to replace all the litter daily.\r\nAvailable in various packaging sizes (5 kg, 10 kg, or more) to suit your needs.\r\n\r\nHow to Use:\r\nFill the litter box with 5–7 cm of litter.\r\nScoop out waste clumps daily using a litter scoop.\r\nAdd fresh litter regularly to maintain cleanliness.\r\nReplace all litter every 1–2 weeks for best results.\r\n\r\nTips for Choosing the Right Cat Litter:\r\nSelect the litter type based on your cat’s preference.\r\nIf your cat is sensitive or allergic, choose organic or low-dust litter.\r\nConsider practicality and convenience — for example, clumping litter for quicker cleaning.\r\n\r\n“Give your beloved cat maximum comfort with high-quality, practical, and hygienic cat litter!” 🐾', 34000, './imgs/pasir.webp', 'Kebersihan', 'pack', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','penjual','pembeli') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `nama`, `email`, `password`, `level`) VALUES
(2, 'Aditiya Alif As Siddiq', 'adit@gmail.com', 'a368402126ad9e4704fbb1ceac9367ad4e2ccf5f', 'penjual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_shipping_status` ON SCHEDULE EVERY 1 HOUR STARTS '2025-01-16 10:40:29' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE `shipping_detail`
    SET `status_pengiriman` = 6
    WHERE `status_pengiriman` = 5
      AND `update_time` <= NOW() - INTERVAL 1 DAY;
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_shipping_status_2_to_3` ON SCHEDULE EVERY 1 HOUR STARTS '2025-01-17 00:20:23' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE `shipping_detail`
    SET `status_pengiriman` = 3, 
        `update_time` = CURRENT_TIMESTAMP
    WHERE `status_pengiriman` = 2 
    AND TIMESTAMPDIFF(HOUR, `update_time`, CURRENT_TIMESTAMP) >= 24;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
