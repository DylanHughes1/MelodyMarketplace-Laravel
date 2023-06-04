<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            /* ---------- */
            [
                'name' => 'Fender Artist Series Stevie Ray Vaughan Stratocaster',
                'price' => '500000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/510053000064000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'La guitarra eléctrica Fender Stevie Ray Vaughan Stratocaster está hecha para Texas Blues - estilo Stevie - con las mismas características que la Stratocaster número uno de Stevie. Las características únicas incluyen un mástil ovalado especial, diapasón de pao ferro con 21 trastes jumbo, tres pastillas Texas Special de bobina simple, herrajes vintage chapados en oro con el exclusivo trémolo sincronizado para zurdos de Stevie y un golpeador grabado especial.',
                'subcategory_id' => 1,
                'hasStock' => true,
            ],
            [
                'name' => 'Gibson Slash Les Paul Standard Gold Top',
                'price' => '900000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L72812000006000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'La Gibson Slash Core Collection Les Paul Standard es el primer modelo exclusivo de Slash con pastillas deportivas de su propio diseño: la SlashBucker de bobinado personalizado. También incorpora las especificaciones favoritas de Slash de su propia colección de Vintage y Custom Shop Les Pauls, como un cuerpo de caoba maciza rematado con arce flameado AAA y un mástil de perfil grueso.',
                'subcategory_id' => 1,
                'hasStock' => true,
            ],
            [
                'name' => 'Gibson ES-335 Figured Semi-Hollow',
                'price' => '1000000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L73705000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'La guitarra eléctrica semihueca Gibson ES-335 es la piedra angular de la línea Gibson ES. Desde su aparición inaugural en 1958, la Gibson ES-335 estableció un estándar inigualable. El diapasón de palisandro con incrustaciones de puntos perlados en un mástil de caoba en "C" redondeado a mano recuerda a los músicos dónde comenzó todo. Las pastillas humbucker Calibrated T-Type de Gibson se combinan con un conjunto de control cableado a mano. El resultado es que los intérpretes de tonos Gibson ES versátiles han anhelado durante más de 60 años.',
                'subcategory_id' => 1,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Fender CD-60SCE Dreadnought',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L44303000002000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Combinando potentes componentes electrónicos integrados, incluido un afinador incorporado, con un gran tono y una fácil interpretación, el CD-60SCE-12 de Fender es la elección perfecta para un músico que busca expandir su paleta sónica con una acústica de 12 cuerdas asequible y de alta calidad',
                
                'subcategory_id' => 2,
                'hasStock' => true,
            ],
            [
                'name' => 'Taylor 414ce V-Class Special-Edition',
                'price' => '650000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L26331000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'La guitarra electroacústica Taylor 414ce V-Class Grand Auditorium, verdaderamente un instrumento único en su tipo, cuenta con muchos elementos personalizados ingeniosamente incorporados por el maestro diseñador de guitarras de Taylor, Andy Powers. Estas intrincadas opciones de diseño, junto con el innovador varetaje V-Class, hacen de esta guitarra mucho más que la suma de sus partes. Todos, desde profesionales hasta aficionados, disfrutarán de esta guitarra hermosa y fácil de tocar',
                'subcategory_id' => 2,
                'hasStock' => true,
            ],
            [
                'name' => 'Epiphone Songmaker DR-100 Vintage Sunburst',
                'price' => '38000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/518569000015000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Una acústica muy bien diseñada que luce una tapa de abeto selecto y un cuerpo y mástil de caoba, este instrumento personifica el enfoque de Epiphone en la calidad asequible. Herrajes cromados, construcción de precisión y diapasón de palisandro con incrustaciones de puntos.',
                'subcategory_id' => 2,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Snark Black Silver Snark Clip-On Tuner',
                'price' => '4500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L86249000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El afinador con clip Snark Black Silver sintoniza cualquier cosa con facilidad y precisión. El afinador está recubierto de goma para ayudar a bloquear el ruido y las vibraciones de otros instrumentos y cuenta con una pantalla fácil de leer. Con una batería de mayor duración y juntas de caucho vulcanizado, el sintonizador Snark Clip-On está diseñado para durar.',
                'subcategory_id' => 3,
                'hasStock' => true,
            ],
            [
                'name' => 'Ernie Ball Regular Slinky 2221 Electric Guitar Strings',
                'price' => '1500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/100622000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Las cuerdas eléctricas Slinky regulares son el conjunto más vendido de Ernie Ball y son las favoritas de muchos músicos de todo el mundo. Las cuerdas Slinky entorchadas normales están hechas de un alambre de acero niquelado envuelto alrededor de un alambre de núcleo de acero con forma hexagonal. Las cuerdas simples están hechas de acero con alto contenido de carbono, estañado y especialmente templado, lo que produce un tono bien equilibrado para su guitarra.',
                'subcategory_id' => 3,
                'hasStock' => true,
            ],
            [
                'name' => 'Road Runner Electric Guitar Gig Bag in a Box Black',
                'price' => '6800',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L53107000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => '
                520 / 5,000
                Resultados de traducción
                Traducción
                Las bolsas Roadrunner Standard Gig Bags brindan el nivel perfecto de protección para su nuevo instrumento. Diseñado y construido con una cubierta exterior de poliéster resistente, acolchado de celdas de espuma abierta y un revestimiento interior de poliéster liviano, protege contra rayones, golpes leves y rozaduras durante el transporte y el almacenamiento. ',
                'subcategory_id' => 3,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Fender Player Jazz Bass Plus Top Green Burst',
                'price' => '200000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L75293000002000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Este Player Jazz Bass Plus Top de edición limitada en Blue Burst ofrece todo lo que un bajista espera de un Jazz Bass tradicional, pero agrega una impresionante chapa de arce flameado. Cargado con pastillas Player Jazz Bass, este bajo es potente y articulado con un tono bien equilibrado para cualquier número de estilos de interpretación. El acabado Blue Burst sobre arce flameado hace que este bajo sea tan impresionante visualmente como sonoramente.',
                'subcategory_id' => 4,
                'hasStock' => true,
            ],
            [
                'name' => 'Squier Affinity Series Precision Bass Olympic White',
                'price' => '63000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L84392000002000-00-720x720.jpg',
                'image_path' => '',
                'description' => '',
                'subcategory_id' => 4,
                'hasStock' => true,
            ],
            [
                'name' => 'Fender American Professional II Precision Bass',
                'price' => '400000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L78032000002000-00-720x720.jpg',
                'image_path' => '',
                'description' => '',
                'subcategory_id' => 4,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Fender Player Jazz Bass Plus Top Limited-Edition',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L27717000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Una excelente puerta de entrada a la tradicional familia Fender, el Precision Bass PJ de la serie Squier Affinity ofrece un diseño legendario y un tono por excelencia para el aspirante a bajista de hoy. Este P Bass presenta varios refinamientos amigables para el jugador, como un cuerpo delgado y liviano, un perfil de cuello en "C" delgado y cómodo y clavijas de engranaje abierto de estilo vintage para una afinación suave y precisa.',
                'subcategory_id' => 5,
                'hasStock' => true,
            ],
            [
                'name' => 'Ibanez AEB5E Acoustic-Electric Bass Black',
                'price' => '61000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/620445000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El bajo electroacústico Ibanez AEB5E ofrece un extremo bajo contundente, ya sea amplificado o no. Como bajo acústico desenchufado, su cuerpo y aros de agathis le dan un tono cálido.',
                'subcategory_id' => 5,
                'hasStock' => true,
            ],
            [
                'name' => 'Mitchell EZB Acoustic-Electric Bass Black',
                'price' => '56500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L54665000003000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Diseñado para cualquier bajista que quiera un bajo acústico fácil de tocar, el Mitchell EZB es un mini bajo de escala súper corta que proporciona un instrumento de tamaño reducido que es muy fácil de tocar, ideal para aquellos con manos más pequeñas y que comienzan a tocar.',
                'subcategory_id' => 5,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Gear One GS5 Guitar Stand Black',
                'price' => '3500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/585763000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El soporte de guitarra GSS es un soporte universal de metal resistente para guitarras eléctricas, acústicas y bajos. Cuenta con un soporte para el mástil que se bloquea en su lugar para mantener su guitarra segura y una cubierta de goma resistente para proteger su acabado. Su diseño convertible de 3 piezas se transporta fácilmente.',
                'subcategory_id' => 6,
                'hasStock' => true,
            ],
            [
                'name' => 'Fender Original Series Instrument Cable',
                'price' => '6100',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L55116000001001-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Los cables de la serie original de Fender se diseñaron combinando una construcción sólida, con blindaje en espiral y conectores niquelados duraderos, con el estilo inimitable de Fender para crear una opción confiable y de alto rendimiento para sus necesidades de cable en el estudio y en el escenario.',
                'subcategory_id' => 6,
                'hasStock' => true,
            ],
            [
                'name' => 'Proline Solid Wood Guitar Wall Hanger Black',
                'price' => '4100',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L65653000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Para el guitarrista que busca un colgador de pared decorativo para exhibir o guardar sus guitarras, los colgadores de pared Proline Premium (GH5BK, GH5N, GH5MH, GH5CH) están diseñados con elegante madera dura genuina para una apariencia clásica pero moderna que complementa cualquier decoración.',
                'subcategory_id' => 6,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Marshall DSL40CR 40W 1x12 Tube Guitar Amp',
                'price' => '240000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/K64638000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => '',
                'subcategory_id' => 7,
                'hasStock' => true,
            ],
            [
                'name' => 'BOSS Katana-50 MkII 50W 1x12 Guitar Combo Amp',
                'price' => '61000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L68667000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El amplificador combinado de guitarra de válvulas Marshall DSL40CR 40W 1x12 está repleto de tonos Marshall, características y funcionalidad para músicos jóvenes y mayores. Puede contar con el DSL40CR para llevar la calidad de Marshall a su próxima práctica o concierto.',
                'subcategory_id' => 7,
                'hasStock' => true,
            ],
            [
                'name' => 'Fender Vintage Reissue 65 Deluxe Reverb Amp',
                'price' => '360000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/480507000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El Fender ´65 Deluxe Reverb Combo Amp tiene un sonido lo suficientemente grande como para atravesar la mezcla más turbia, pero es lo suficientemente pequeño como para aprovechar al máximo la distorsión natural del tubo en clubes pequeños. Esto también lo convierte en el amplificador de estudio perfecto',
                'subcategory_id' => 7,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Fender Rumble 40 1x10 40W Bass Combo Amp',
                'price' => '52000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J06161000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'El combo de bajo Rumble 1x10" 40W es una opción ideal para la práctica, el estudio o el ensayo, con su gran tono, tamaño pequeño y controles fáciles de usar. Además del altavoz de diseño especial Fender de 1x10", sus características incluyen un aux. entrada, salida de auriculares, salida de línea XLR y ecualizador de tres bandas.',
                'subcategory_id' => 8,
                'hasStock' => true,
            ],
            [
                'name' => 'Peavey MAX 100 100W 1x10 Bass Combo Amp',
                'price' => '68000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L19565000001000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'The Peavey MAX Series is designed for superior tone, performance and reliability in portable bass amplification, with Peavey´s DDT speaker protection and exclusive tone enhancements.',
                'subcategory_id' => 8,
                'hasStock' => true,
            ],
            [
                'name' => 'Fender Rumble 100 1x12 100W Bass Combo Amp',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J06156000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'The Rumble Series is a mighty leap forward in the evolution of portable bass amps.',
                'subcategory_id' => 8,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'BOSS DS-1 Distortion Pedal',
                'price' => '15000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/151258000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Desde gritar fuerte hasta susurrar suavemente, el pedal de distorsión Boss DS-1 puede reproducir fielmente la dinámica de su estilo de interpretación. Los controles de nivel y distorsión le brindan un control completo de la cantidad de procesamiento de la señal.',
                'subcategory_id' => 9,
                'hasStock' => true,
            ],
            [
                'name' => 'Dunlop Original Cry Baby Wah Pedal',
                'price' => '22500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/151000000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Si tocas lo real, obtienes el sonido real. El pedal Dunlop Original Cry Baby Wah tiene una construcción pesada de acero fundido a presión. Hecho en los EE. UU.',
                'subcategory_id' => 9,
                'hasStock' => true,
            ],
            [
                'name' => 'Line 6 Helix Multi-Effects Guitar Pedal',
                'price' => '380000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J23118000000000-00-720x720.jpg',
                'image_path' => '',
                'description' => 'Helix es un nuevo tipo de procesador de guitarra multiefectos: no solo es un pedal multiefectos de nivel de gira que suena y se siente auténtico, también es uno de los controladores maestros más completos para sistemas de guitarra jamás creados.',
                'subcategory_id' => 9,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Rogue RGD0520 5-Piece Complete Drum Set',
                'price' => '92210',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L71942000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El juego de batería completo de 5 piezas Rogue RGD0520 incluye todo lo que un jugador avanzado necesita para impulsar su viaje musical. Este kit de tamaño adulto con todo incluido viene con dos toms de rack y un tom de piso, una caja a juego y un bombo. Viene completo con soportes y pedales, incluido un pedal de bombo accionado por cadena, un soporte/pedal de charles, un soporte de caja y un soporte ajustable de platillos con brazo oculto de doble refuerzo, incluso un trono de batería y baquetas.',
                'subcategory_id' => 10,
                'hasStock' => true,
            ],
            [
                'name' => 'Yamaha Stage Custom Birch 5-Piece Shell Pack With 22" Bass Drum',
                'price' => '171010',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J07117000006000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Este paquete de cascos de batería de abedul Yamaha Stage Custom también es ideal para principiantes o profesionales que trabajan. La costura diagonal escalonada permitió a Yamaha construir un casco de batería delgado que comenzará redondo y permanecerá redondo. Las orejetas de baja masa permiten que la carcasa vibre para un tono y un sostenido excelentes.',
                'subcategory_id' => 10,
                'hasStock' => true,
            ],
            [
                'name' => 'Rogue Junior Kicker 5-Piece Drum Set',
                'price' => '68400',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L77816000004000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El Rogue Junior Kicker Drum Set es un kit de batería de 5 piezas en un tamaño manejable para el jugador junior, pero construido según los exigentes estándares de un conjunto de tamaño completo. La configuración "todo en uno" del Junior Kicker viene completa con todo lo necesario para comenzar a tocar nada más sacarlo de la caja, incluido un bombo de 18", una caja, tres timbales, soportes, platillo, trono, pedal de bombo, afinación tecla e incluso un par de baquetas.',
                'subcategory_id' => 10,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Alesis Nitro Mesh Special-Edition 8-Piece Electronic Drum Set',
                'price' => '102380',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L71942000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Ahora disponible en un acabado rojo personalizado, la batería electrónica de 8 piezas Alesis Nitro Mesh Special-Edition ofrece la experiencia de interpretación más realista para cada baterista, y permanece perfectamente silenciosa en situaciones en las que no desea molestar a nadie.',
                'subcategory_id' => 11,
                'hasStock' => true,
            ],
            [
                'name' => 'Simmons SD1250 Electronic Drum Kit With Mesh Pads',
                'price' => '250600',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L83812000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Domina tu oficio con el kit de batería electrónica premium de 6 piezas Simmons SD1250. El SD1250 incluye un bombo de malla, una caja de 12" y cuatro toms. Alojado en un diseño distintivo de carcasa de batería, la caja cuenta con un sensor de disparo en el aro e incluye su propio soporte para obtener el ángulo perfecto.',
                'subcategory_id' => 11,
                'hasStock' => true,
            ],
            [
                'name' => 'Simmons SD600 Electronic Drum Set With Mesh Heads and Bluetooth',
                'price' => '91200',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L28143000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Diseñado para el baterista que quiere una batería electrónica sólida como una roca para practicar, ensayar y grabar, el kit de cabezal de malla Simmons SD600 con Bluetooth es ideal para los músicos que buscan un sonido y una sensación acústicos, características premium y la capacidad de expanda, cree y conéctese de forma inalámbrica a través de Bluetooth.',
                'subcategory_id' => 11,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'ROC-N-SOC Nitro Throne',
                'price' => '51300',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/442612000001000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Este Roc-N-Soc Nitro Throne le ofrece un asiento compacto con un amortiguador de gas nitrógeno incorporado para mayor comodidad y mayor rebote. Arriostramiento pesado. El diseño de la bicicleta reduce la fatiga de las piernas. Altura del asiento ajustable de 18 a 24 pulgadas.',
                'subcategory_id' => 12,
                'hasStock' => true,
            ],
            [
                'name' => 'DW 9000 Series Double Bass Drum Pedal',
                'price' => '205222',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/H89143000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El buque insignia de la línea de pedales DW, el pedal doble DW 9000 presenta múltiples innovaciones patentadas, como un sistema de accionamiento de rotor de flotación libre, resortes giratorios giratorios y levas infinitamente ajustables que permiten una transferencia de energía más directa que optimiza el golpe para más potencia y precisión.',
                'subcategory_id' => 12,
                'hasStock' => true,
            ],
            [
                'name' => 'Proline Snare Utility Rack',
                'price' => '22800',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J06810000001000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El Proline PLDR6 es el único rack utilitario de caja diseñado especialmente para que los bateristas almacenen varias cajas de varios tamaños. Ideal en el hogar, en los espacios de ensayo, en los estudios, en cualquier lugar donde un baterista o una instalación deseen almacenar sus instrumentos de forma segura y mantenerlos fácilmente accesibles.',
                'subcategory_id' => 12,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Casio CDP-S360 Digital Piano With X-Stand and Bench',
                'price' => '155056',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L95307000001001-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Este paquete de piano digital CDP-S360 con soporte para teclado On-Stage Lok-Tight Double-X y banco acolchado de piel sintética Musician´s Gear de altura ajustable brinda una sensación y un tono de piano auténticos en un paquete conveniente. Cuenta con una gran colección de tonos y ritmos y herramientas de producción musical en un estuche delgado de una sola pieza que es apenas más grande que las teclas',
                'subcategory_id' => 13,
                'hasStock' => true,
            ],
            [
                'name' => 'Casio PX-S1100 Privia Digital Piano With CS-68 Stand and SP-34 Pedal',
                'price' => '222780',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L88783000003000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Este piano digital Casio PX-S1100 Privia viene con un soporte y un pedal, para que pueda comenzar a tocar rápidamente. El Privia PX-S1100 lleva el galardonado diseño PX-S a nuevas alturas con sonido de piano mejorado, altavoces mejorados, conectividad Bluetooth mejorada y más. El PX-S1100 está diseñado como una fuente de inspiración que se adapta perfectamente a tu vida.',
                'subcategory_id' => 13,
                'hasStock' => true,
            ],
            [
                'name' => 'Roland FP-30X Digital Piano With Matching Stand and DP-10 Damper Pedal',
                'price' => '217750',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L85088000002000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El piano digital FP-30X de Roland viene con el pedal amortiguador DP-10 y un soporte para que pueda comenzar a tocar de inmediato. Equilibrando la asequibilidad con un rendimiento superior, este piano portátil delgado y elegante se basa en el FP-10 de nivel de entrada con un motor de sonido mejorado, altavoces integrados más potentes y polifonía mejorada.',
                'subcategory_id' => 13,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Hammond XK-5 ProStyle Lower Manual',
                'price' => '501650',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J44132000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El manual inferior XLK-5 (con la misma acción de tecla y sistema multicontacto que el XK-5) convierte al XK-5 en un órgano portátil de doble manual. Sus paneles laterales extendidos verticalmente reemplazan a los del XK-5, creando un órgano manual dual sin espacios que se puede transportar como una sola pieza. Si eres un jugador de B-3 acostumbrado a los manuales duales, esta es una adición lógica a tu XK-5.',
                'subcategory_id' => 14,
                'hasStock' => true,
            ],
            [
                'name' => 'Hammond XK-1c Portable Organ',
                'price' => '393340',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/H99720000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El XK-1c es el órgano Hammond genuino más pequeño y liviano de Hammond. Un marcado contraste con los días en que necesitabas un camión para transportar un órgano B-3 y un altavoz Leslie para ese sonido Hammond rugiente, el XK-1c ocupa mucho menos espacio y es mucho más fácil de transportar. El XK-1c aún brinda toda la majestuosidad y versatilidad del estándar de la industria B-3, pero en un paquete compacto que pesa solo 16 libras.',
                'subcategory_id' => 14,
                'hasStock' => true,
            ],
            [
                'name' => 'Used Roland Vk8 Organ',
                'price' => '159610',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J42347000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Accesorios incluidos: Cable de alimentación/Fuente.',
                'subcategory_id' => 14,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Native Instruments KOMPLETE KONTROL S88 MK2 MIDI Controller',
                'price' => '204990',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L35589000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Con los teclados KOMPLETE KONTROL S-SERIES, como este controlador MIDI S88 MK2, la creación musical se convierte en una experiencia práctica más intuitiva. Interprete de forma expresiva, busque y obtenga una vista previa de los sonidos, modifique los parámetros, esboce sus ideas, luego navegue y mezcle su proyecto, todo desde una pieza central completamente integrada para el estudio y el escenario.',
                'subcategory_id' => 15,
                'hasStock' => true,
            ],
            [
                'name' => 'Akai Professional MPC Studio Music Production Controller',
                'price' => '45370',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L87785000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El controlador de producción musical Akai Professional MPC Studio trae la experiencia MPC total a su computadora al combinar un control de hardware intuitivo y un software innovador e inspirador. Cargue un bucle de la biblioteca, córtelo en muestras, establezca un ritmo y luego toque instrumentos sobre él para agregar más texturas melódicas.',
                'subcategory_id' => 15,
                'hasStock' => true,
            ],
            [
                'name' => 'Akai Professional Force Music Production System',
                'price' => '296207',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L47631000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Puede decidir deshacerse de su computadora portátil para siempre después de tener en sus manos el muestreador y secuenciador independiente Akai Professional Force. Pero combinado con Ableton Live en su computadora, Force se convierte en uno de los sistemas de producción musical más poderosos disponibles.',
                'subcategory_id' => 15,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Sterling Audio MX3 3" Powered Studio Monitor',
                'price' => '27360',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L19694000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Cuando necesite que sus monitores de estudio sean tan transparentes como versátiles, los monitores de estudio con alimentación negra Sterling MX3 son la solución perfecta. Suenan genial, tienen un elegante acabado en negro mate, controladores LF de 3", tweeters de 3/4", control de volumen de acceso frontal con salidas dobles de 3,5 mm y conectividad RCA.',
                'subcategory_id' => 16,
                'hasStock' => true,
            ],
            [
                'name' => 'Mackie CR3-XBTLTD-WHT-DRVR 3" Multimedia Monitors All-White With Black',
                'price' => '45330',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L86953000001000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Estos monitores multimedia de referencia creativa CR3-XBTLTD-WHT-DRVR de 3" con Bluetooth de Mackie de edición limitada son excelentes para grabar, crear contenido o simplemente relajarse con sus canciones favoritas, y cuentan con un exclusivo diseño Guitar Center con componentes completamente blancos recortados en negro con detalles plateados.',
                'subcategory_id' => 16,
                'hasStock' => true,
            ],
            [
                'name' => 'Mackie CR3-XBT 3" Active 50W Bluetooth Multimedia Studio Monitors, Pair',
                'price' => '38600',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L73334000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Los monitores activos Mackie CR3-XBT son los monitores multimedia de referencia creativa de la serie CR más compactos. Ofrecen sonido con calidad de estudio con cosméticos que complementan cualquier escritorio, ya sea que esté haciendo música, creando contenido o simplemente relajándose con sus canciones favoritas.',
                'subcategory_id' => 16,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'Universal Audio Apollo Twin X QUAD Heritage Edition Thunderbolt 3',
                'price' => '341810',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L81213000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Apollo Twin X QUAD Heritage Edition es una edición especial de la interfaz de audio Thunderbolt 3 de escritorio 10 x 6 de Universal Audio con procesamiento de núcleo UAD QUAD en tiempo real y dos preamplificadores de micrófono Unison para Mac y Windows.',
                'subcategory_id' => 17,
                'hasStock' => true,
            ],
            [
                'name' => 'M-Audio AIR 192|4 USB-C Audio Interface',
                'price' => '27135',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L69987000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Con el AIR 192|4, puede crear grabaciones perfectas con calidad de estudio de 24 bits/192 kHz con una interfaz de audio intuitiva y fácil de usar. Con un elegante chasis de metal de calidad profesional con una gran perilla de volumen central, el AIR 192|4 cuenta con exclusivos preamplificadores Crystal de bajo ruido y convertidores A/D nítidos que brindan el rendimiento de audio más alto de su clase.',
                'subcategory_id' => 17,
                'hasStock' => true,
            ],
            [
                'name' => 'RANE TWELVE MKII Motorized Battle-Ready DJ MIDI Controller',
                'price' => '204996',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L77468000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El controlador MIDI DJ RANE TWELVE MKII motorizado Battle-Ready es un controlador potente que proporciona una experiencia de interpretación práctica y precisa sin concesiones al software de DJ digital, liberando a los DJ y tocadiscos del dolor de los brazos o agujas dañados y elimina la retroalimentación de audio no deseada, trayendo sub -bajo de nuevo en su música.',
                'subcategory_id' => 17,
                'hasStock' => true,
            ],
            /* ---------- */
            [
                'name' => 'RODE NT1-A Large-Diaphragm Condenser Microphone With SM6 Shockmount',
                'price' => '56770',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/476502000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => '',
                'subcategory_id' => 18,
                'hasStock' => true,
            ],
            [
                'name' => 'Universal Audio Sphere DLX Modeling Microphone',
                'price' => '294150',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L98186000000000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'Para celebrar los 15 años de los RØDE NT1 y NT1-A, los micrófonos RØDE han creado un paquete NT1-A revisado, que incluye un amortiguador premium, un filtro pop, un cable, una cubierta antipolvo para el micrófono y un DVD instructivo adicional.',
                'subcategory_id' => 18,
                'hasStock' => true,
            ],
            [
                'name' => 'Neumann TLM 103 Condenser Microphone',
                'price' => '272492',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J52341000001000-00-600x600.jpg',
                'image_path' => '',
                'description' => 'El micrófono de condensador cardioide Neumann TLM 103 lleva el codiciado sonido de Neumann al hogar y al estudio de proyectos. Combina una cápsula basada en el famoso K 87 con un diseño sin transformador, lo que proporciona un ruido propio ultra bajo y una alta tolerancia SPL de hasta 138 dB.',
                'subcategory_id' => 18,
                'hasStock' => true,
            ],
        ];

        DB::table('product')->insert($data);
    }
}