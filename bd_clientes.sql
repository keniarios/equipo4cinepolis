PGDMP         4            
    v         	   CINEPOLIS    10.5    10.5 C    D           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            E           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            F           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            G           1262    16405 	   CINEPOLIS    DATABASE     �   CREATE DATABASE "CINEPOLIS" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';
    DROP DATABASE "CINEPOLIS";
             postgres    false            H           0    0    DATABASE "CINEPOLIS"    COMMENT     ?   COMMENT ON DATABASE "CINEPOLIS" IS 'Para fines estudiantiles';
                  postgres    false    2887                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            I           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    4                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            J           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    2                        3079    16384 	   adminpack 	   EXTENSION     A   CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;
    DROP EXTENSION adminpack;
                  false            K           0    0    EXTENSION adminpack    COMMENT     M   COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';
                       false    1            �            1259    16581    altasucursal    TABLE     ~   CREATE TABLE public.altasucursal (
    id_sucursal integer NOT NULL,
    nombre text,
    ciudad text,
    estatus integer
);
     DROP TABLE public.altasucursal;
       public         postgres    false    4            �            1259    16587    altasucursal_id_sucursal_seq    SEQUENCE     �   CREATE SEQUENCE public.altasucursal_id_sucursal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.altasucursal_id_sucursal_seq;
       public       postgres    false    197    4            L           0    0    altasucursal_id_sucursal_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.altasucursal_id_sucursal_seq OWNED BY public.altasucursal.id_sucursal;
            public       postgres    false    198            �            1259    16589    horarios    TABLE     �   CREATE TABLE public.horarios (
    id_horario integer NOT NULL,
    id_pelicula integer,
    hora text,
    fecha text,
    idioma text,
    sala integer,
    id_sucursal integer,
    ciudad text
);
    DROP TABLE public.horarios;
       public         postgres    false    4            �            1259    16595    horarios_id_horario_seq    SEQUENCE     �   CREATE SEQUENCE public.horarios_id_horario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.horarios_id_horario_seq;
       public       postgres    false    199    4            M           0    0    horarios_id_horario_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.horarios_id_horario_seq OWNED BY public.horarios.id_horario;
            public       postgres    false    200            �            1259    16597 	   peliculas    TABLE     Y  CREATE TABLE public.peliculas (
    id_pelicula integer NOT NULL,
    imagen text,
    titulo text,
    paisorigen text,
    anoestreno text,
    clasificacion text,
    duracion text,
    genero text,
    ciudad text,
    sinopsis text,
    actores text,
    directores text,
    idiomaespanol integer,
    idiomaingles integer,
    subtituloespanol integer,
    subtituloingles integer,
    pelicula3d integer,
    idiomaespanol3d integer,
    idiomaingles3d integer,
    subtituloespanol3d integer,
    subtituloingles3d integer,
    nombreoriginal text,
    estatus integer,
    rutavideo text
);
    DROP TABLE public.peliculas;
       public         postgres    false    4            �            1259    16603    peliculas_id_pelicula_seq    SEQUENCE     �   CREATE SEQUENCE public.peliculas_id_pelicula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.peliculas_id_pelicula_seq;
       public       postgres    false    201    4            N           0    0    peliculas_id_pelicula_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.peliculas_id_pelicula_seq OWNED BY public.peliculas.id_pelicula;
            public       postgres    false    202            �            1259    16605    precioboletos    TABLE     J  CREATE TABLE public.precioboletos (
    id_precio integer NOT NULL,
    nombrecine text,
    tiposala text,
    adultoprimerrango integer,
    terceraedadprimerrango integer,
    ninosprimerrango integer,
    adultosegundorango integer,
    terceraedadsegundorango integer,
    ninossegundorango integer,
    nombreciudad text
);
 !   DROP TABLE public.precioboletos;
       public         postgres    false    4            �            1259    16611    precioboletos_id_precio_seq    SEQUENCE     �   CREATE SEQUENCE public.precioboletos_id_precio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.precioboletos_id_precio_seq;
       public       postgres    false    203    4            O           0    0    precioboletos_id_precio_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.precioboletos_id_precio_seq OWNED BY public.precioboletos.id_precio;
            public       postgres    false    204            �            1259    16613    registrocinepolisid    TABLE     }  CREATE TABLE public.registrocinepolisid (
    id_cinepolisid integer NOT NULL,
    nombre text,
    apellidopaterno text,
    apellidomaterno text,
    correo text,
    contrasena text,
    tarjetaclub text,
    preguntaseguridad text,
    respuestapreguntaseguridad text,
    dianacimiento text,
    mesnacimiento text,
    anonacimiento text,
    lada text,
    telefono text
);
 '   DROP TABLE public.registrocinepolisid;
       public         postgres    false    4            �            1259    16619 &   registrocinepolisid_id_cinepolisid_seq    SEQUENCE     �   CREATE SEQUENCE public.registrocinepolisid_id_cinepolisid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.registrocinepolisid_id_cinepolisid_seq;
       public       postgres    false    4    205            P           0    0 &   registrocinepolisid_id_cinepolisid_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.registrocinepolisid_id_cinepolisid_seq OWNED BY public.registrocinepolisid.id_cinepolisid;
            public       postgres    false    206            �            1259    16621    registropersonal    TABLE     �   CREATE TABLE public.registropersonal (
    id_registropersonal integer NOT NULL,
    numeroempleado text,
    nombre text,
    appaterno text,
    apmaterno text,
    correo text,
    contrasena text,
    telefono text,
    puesto text
);
 $   DROP TABLE public.registropersonal;
       public         postgres    false    4            �            1259    16627 (   registropersonal_id_registropersonal_seq    SEQUENCE     �   CREATE SEQUENCE public.registropersonal_id_registropersonal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.registropersonal_id_registropersonal_seq;
       public       postgres    false    207    4            Q           0    0 (   registropersonal_id_registropersonal_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.registropersonal_id_registropersonal_seq OWNED BY public.registropersonal.id_registropersonal;
            public       postgres    false    208            �            1259    16629    salas    TABLE     �   CREATE TABLE public.salas (
    id_sala integer NOT NULL,
    nombre text,
    id_sucursal integer,
    ciudad text,
    estatus text,
    tiposala text,
    asientos_seleccionados text
);
    DROP TABLE public.salas;
       public         postgres    false    4            �            1259    16635    salas_id_sala_seq    SEQUENCE     �   CREATE SEQUENCE public.salas_id_sala_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.salas_id_sala_seq;
       public       postgres    false    209    4            R           0    0    salas_id_sala_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.salas_id_sala_seq OWNED BY public.salas.id_sala;
            public       postgres    false    210            �            1259    16637    slider    TABLE     �   CREATE TABLE public.slider (
    id_slider integer NOT NULL,
    titulo text,
    rutaimagenbanner text,
    rutaimagenmovil text,
    rutaimagenmini text,
    posicion integer
);
    DROP TABLE public.slider;
       public         postgres    false    4            �            1259    16643    slider_id_slider_seq    SEQUENCE     �   CREATE SEQUENCE public.slider_id_slider_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.slider_id_slider_seq;
       public       postgres    false    211    4            S           0    0    slider_id_slider_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.slider_id_slider_seq OWNED BY public.slider.id_slider;
            public       postgres    false    212            �
           2604    16645    altasucursal id_sucursal    DEFAULT     �   ALTER TABLE ONLY public.altasucursal ALTER COLUMN id_sucursal SET DEFAULT nextval('public.altasucursal_id_sucursal_seq'::regclass);
 G   ALTER TABLE public.altasucursal ALTER COLUMN id_sucursal DROP DEFAULT;
       public       postgres    false    198    197            �
           2604    16646    horarios id_horario    DEFAULT     z   ALTER TABLE ONLY public.horarios ALTER COLUMN id_horario SET DEFAULT nextval('public.horarios_id_horario_seq'::regclass);
 B   ALTER TABLE public.horarios ALTER COLUMN id_horario DROP DEFAULT;
       public       postgres    false    200    199            �
           2604    16647    peliculas id_pelicula    DEFAULT     ~   ALTER TABLE ONLY public.peliculas ALTER COLUMN id_pelicula SET DEFAULT nextval('public.peliculas_id_pelicula_seq'::regclass);
 D   ALTER TABLE public.peliculas ALTER COLUMN id_pelicula DROP DEFAULT;
       public       postgres    false    202    201            �
           2604    16648    precioboletos id_precio    DEFAULT     �   ALTER TABLE ONLY public.precioboletos ALTER COLUMN id_precio SET DEFAULT nextval('public.precioboletos_id_precio_seq'::regclass);
 F   ALTER TABLE public.precioboletos ALTER COLUMN id_precio DROP DEFAULT;
       public       postgres    false    204    203            �
           2604    16649 "   registrocinepolisid id_cinepolisid    DEFAULT     �   ALTER TABLE ONLY public.registrocinepolisid ALTER COLUMN id_cinepolisid SET DEFAULT nextval('public.registrocinepolisid_id_cinepolisid_seq'::regclass);
 Q   ALTER TABLE public.registrocinepolisid ALTER COLUMN id_cinepolisid DROP DEFAULT;
       public       postgres    false    206    205            �
           2604    16650 $   registropersonal id_registropersonal    DEFAULT     �   ALTER TABLE ONLY public.registropersonal ALTER COLUMN id_registropersonal SET DEFAULT nextval('public.registropersonal_id_registropersonal_seq'::regclass);
 S   ALTER TABLE public.registropersonal ALTER COLUMN id_registropersonal DROP DEFAULT;
       public       postgres    false    208    207            �
           2604    16651    salas id_sala    DEFAULT     n   ALTER TABLE ONLY public.salas ALTER COLUMN id_sala SET DEFAULT nextval('public.salas_id_sala_seq'::regclass);
 <   ALTER TABLE public.salas ALTER COLUMN id_sala DROP DEFAULT;
       public       postgres    false    210    209            �
           2604    16652    slider id_slider    DEFAULT     t   ALTER TABLE ONLY public.slider ALTER COLUMN id_slider SET DEFAULT nextval('public.slider_id_slider_seq'::regclass);
 ?   ALTER TABLE public.slider ALTER COLUMN id_slider DROP DEFAULT;
       public       postgres    false    212    211            2          0    16581    altasucursal 
   TABLE DATA               L   COPY public.altasucursal (id_sucursal, nombre, ciudad, estatus) FROM stdin;
    public       postgres    false    197   rO       4          0    16589    horarios 
   TABLE DATA               k   COPY public.horarios (id_horario, id_pelicula, hora, fecha, idioma, sala, id_sucursal, ciudad) FROM stdin;
    public       postgres    false    199   �O       6          0    16597 	   peliculas 
   TABLE DATA               X  COPY public.peliculas (id_pelicula, imagen, titulo, paisorigen, anoestreno, clasificacion, duracion, genero, ciudad, sinopsis, actores, directores, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d, nombreoriginal, estatus, rutavideo) FROM stdin;
    public       postgres    false    201   IP       8          0    16605    precioboletos 
   TABLE DATA               �   COPY public.precioboletos (id_precio, nombrecine, tiposala, adultoprimerrango, terceraedadprimerrango, ninosprimerrango, adultosegundorango, terceraedadsegundorango, ninossegundorango, nombreciudad) FROM stdin;
    public       postgres    false    203   �`       :          0    16613    registrocinepolisid 
   TABLE DATA               �   COPY public.registrocinepolisid (id_cinepolisid, nombre, apellidopaterno, apellidomaterno, correo, contrasena, tarjetaclub, preguntaseguridad, respuestapreguntaseguridad, dianacimiento, mesnacimiento, anonacimiento, lada, telefono) FROM stdin;
    public       postgres    false    205   �`       <          0    16621    registropersonal 
   TABLE DATA               �   COPY public.registropersonal (id_registropersonal, numeroempleado, nombre, appaterno, apmaterno, correo, contrasena, telefono, puesto) FROM stdin;
    public       postgres    false    207   �a       >          0    16629    salas 
   TABLE DATA               p   COPY public.salas (id_sala, nombre, id_sucursal, ciudad, estatus, tiposala, asientos_seleccionados) FROM stdin;
    public       postgres    false    209   Nb       @          0    16637    slider 
   TABLE DATA               p   COPY public.slider (id_slider, titulo, rutaimagenbanner, rutaimagenmovil, rutaimagenmini, posicion) FROM stdin;
    public       postgres    false    211   _d       T           0    0    altasucursal_id_sucursal_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.altasucursal_id_sucursal_seq', 5, true);
            public       postgres    false    198            U           0    0    horarios_id_horario_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.horarios_id_horario_seq', 9, true);
            public       postgres    false    200            V           0    0    peliculas_id_pelicula_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.peliculas_id_pelicula_seq', 25, true);
            public       postgres    false    202            W           0    0    precioboletos_id_precio_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.precioboletos_id_precio_seq', 1, true);
            public       postgres    false    204            X           0    0 &   registrocinepolisid_id_cinepolisid_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.registrocinepolisid_id_cinepolisid_seq', 1, true);
            public       postgres    false    206            Y           0    0 (   registropersonal_id_registropersonal_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.registropersonal_id_registropersonal_seq', 6, true);
            public       postgres    false    208            Z           0    0    salas_id_sala_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.salas_id_sala_seq', 5, true);
            public       postgres    false    210            [           0    0    slider_id_slider_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.slider_id_slider_seq', 4, true);
            public       postgres    false    212            �
           2606    16654    altasucursal altasucursal_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.altasucursal
    ADD CONSTRAINT altasucursal_pkey PRIMARY KEY (id_sucursal);
 H   ALTER TABLE ONLY public.altasucursal DROP CONSTRAINT altasucursal_pkey;
       public         postgres    false    197            �
           2606    16656    horarios horarios_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.horarios
    ADD CONSTRAINT horarios_pkey PRIMARY KEY (id_horario);
 @   ALTER TABLE ONLY public.horarios DROP CONSTRAINT horarios_pkey;
       public         postgres    false    199            �
           2606    16658    peliculas peliculas_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.peliculas
    ADD CONSTRAINT peliculas_pkey PRIMARY KEY (id_pelicula);
 B   ALTER TABLE ONLY public.peliculas DROP CONSTRAINT peliculas_pkey;
       public         postgres    false    201            �
           2606    16660     precioboletos precioboletos_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.precioboletos
    ADD CONSTRAINT precioboletos_pkey PRIMARY KEY (id_precio);
 J   ALTER TABLE ONLY public.precioboletos DROP CONSTRAINT precioboletos_pkey;
       public         postgres    false    203            �
           2606    16662 ,   registrocinepolisid registrocinepolisid_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.registrocinepolisid
    ADD CONSTRAINT registrocinepolisid_pkey PRIMARY KEY (id_cinepolisid);
 V   ALTER TABLE ONLY public.registrocinepolisid DROP CONSTRAINT registrocinepolisid_pkey;
       public         postgres    false    205            �
           2606    16664 &   registropersonal registropersonal_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.registropersonal
    ADD CONSTRAINT registropersonal_pkey PRIMARY KEY (id_registropersonal);
 P   ALTER TABLE ONLY public.registropersonal DROP CONSTRAINT registropersonal_pkey;
       public         postgres    false    207            �
           2606    16666    salas salas_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.salas
    ADD CONSTRAINT salas_pkey PRIMARY KEY (id_sala);
 :   ALTER TABLE ONLY public.salas DROP CONSTRAINT salas_pkey;
       public         postgres    false    209            �
           2606    16668    slider slider_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.slider
    ADD CONSTRAINT slider_pkey PRIMARY KEY (id_slider);
 <   ALTER TABLE ONLY public.slider DROP CONSTRAINT slider_pkey;
       public         postgres    false    211            2   Y   x�3�t��;�� ?'�X! �85_!81O��83�(�ӹ4'31���<NC.d�a�
Ide��ʂS�RR��|�Kr@
,C�=... ?�/�      4   ^   x���4�42�25�420��54�50�.M�Sp-.H<�1?�Ӑӄӹ4'31���<.KNCc��y�9��@��H�͡#+��m�bv� ��&y      6      x��Y�n�=s�����R�lys�d��^ɻ��k8ȥ9�$����vO�K��9H>�� �o���?���R���@�Dg���^�zU3<��j��\�Ɣ��?=yz؟�'��F��ީ?G��:�ʩo��]�?�bs�;������ǽ��ѣީ�La��t�����i,�����y,��I�]��q���Ս�#=��љ
F�z�ʘ{�t�����o�{ե�<�;��7��0�����9ZS+����W��k�
�
���27Uj57>�I��s�y�{���H�ҨX��.-�ĉx�)|oJ�Uua���Ν:�u������cnןkgM���op��ao����tX*�JNウ��Yj�gq�ԎK�C�_T���zf�(Xcr&��q�}_�jlk]f��[F��
NU�_�-BGވ;
9����<�굮�\ܾ�x��%\��(��y�HcM5w�*�o�Bb:6���#��R��]�vrw=,�T��5b��l���b��\��p�A���&60��F��;�V�Q��UVi���8z�����:�}>ţ5�l�z�W:�^:�s\�Չ�6�7��~���3⠷ ^�b�A�͠j������z���#I�WV�^���筻�S�SO�~7��"`QƹQXv������K�̉�Wf�ݗ��Dt�.H>��<��!�1"M����LM�έJ7n��T�jj<�w�L���ɩ�͌���.)K�@>#� 4I���(`��"��Tಛ��4
�6W���@�����4 k`��2`!O�=��#��R�4:��6񒎅�x8fc�`:e�� �.,r��fX��f�o�3�W��
3Gn[#A���,�[����C�0�R<���DE:G"DfH�/��"�R�:���;�1}��- ���#��[�~�A+�I�/�pm"��`@�U+�.6�4��� lC~A��&(���8T�*��K�%�ĺ~�˳c?Y��lB��?<q��'��*!cG\� xi&��r��X/KX���<7�6�nf���&�d�$��N.����zυ؂�qr�vQ���\Bt#�~�%/�8�|0�����N����\�K�9�7�R������4+`��Ph����j��7�r�>�]��b�J��G���I�,0?��X��8�����W������ �1��n��!���.�-�U�&�M24Ye�)æ� �ِ5�]��)��wG@�7����M��ę�|� �=��<�%ȧ��%>����	���'{��@��]0EêH��>ߥЃ�aK�W1 C���F�����>�c%bC�t�ʂ�g�)b�r��/�%��H� bhhi��%�gK��PN��I���0����l�f����@�&�Qi�8���S;Kh�ۈ���z���tH$��Ĵ���粖ן��OHXa�S�F�ڕ��0��C�#<Р��!��֟K�U�xHHh����%��A���`��h|��0]��<A�I27;?&��^�'�c^&ere�ʷ� ��?��=�Ţ N���>IJXT֨�d˛p{�?�<"���yh�X{FWC���4��1�_���i<�`ȹ)D�)C�h�Q�vY���F�iB�tl��H]1t[���{�v'Uܗ�:R7Ə�)���%�ԺA}�pL��"T����cW�ŉlbA�pq�~��ݲVQ�OCEZ� �$�=���Nu369��� /�@��P�T0Y��3�Vdh�%�� ]�R�)��Qq7nw�/1���	��á����N�C�R��Ec�?@����o뱔�88Fޅԑm�8`�`��$�m� �_�:s(&I�����@��VI�ے�"9.$��K�G�qt4'���� |�	�
,��T ��s��������Rn��Dy@���'%��{NL=ӕ(g��f����
�\:+��v�[Si��JTF��	D"��!�AI
��-���-���x զ��
X��R� �64���s�r������Ќ�S	GoS�Z~��(��|p�������	s��c/�h����)m� 3kƕZka�W��.��P9��lA	��*!�5f��;ƒw��{���֩����AM�H�sc �k(��=�*��M�S�<��5�D��AK%���p�5� C(����8#��&}�>O���@��&A�2uu�V�΢���X��+U�c "k��|b���y_]5�6_��=�
�t~-�@W���Au}�����4����^u������S�0���4��d�ԃ�P�j������R/�k��3x��2��3�d@������{�>s.�Q�����C���>�1|��������<�J"�]�7d28�dx�������RY�>�By���:�"�N#�(�e��tȡ�3�D��x��6�f��<j,�
$(b�&��!��7����Ye*"�(�����ɳc$�0P��]�����@�xc|6۱%�U�ҍ������B1kJ�{��l$�U-Ow�)����vl��<i�Ý�\ٷ���~%<Wl~�\a3tw�0�&9��Vl�����:�l9[�ֵ��4�V�47���0)��R!����̵��1����&>6��>�c˜LZ@=�AA���!lC�4�DZ2u�m�J]�E
ld"�h��R�!RS.ש�?Ld���+��uW6ډ����x��D<6o��U����n[�|타�k��p)��nV 
����?�Yp�)�u\�_��~�;ݬ��U8A*5:�,gi�u��Om�(��:G7���;]v�r��S?���c�Á���M�W��r����=�!�Ѵ|�&��9.�ϣ_�C"�i`�]����?���&Zw������'ʰ6�:�
�6G]h�=�H6Ag�����V�&b^z ����٭b"�r	m�G�K;����f�K|�	n�R��h��)N�,e���IiG�v��5n2�����-�xc֟}��0Gl�Ҡh���7��d9.�B�*�]�੽<Y q����dmsŽ��`nS���Rv�b\lF�l�$CWf���n�e��f��-գ�}nQ�mk\]�	�ų��Tǿ�gn�K���hh	��_Z�P�Y������V&g���y�]~�Wo7o�a���{����vM,N[��l����Kh����iy�F٧�h���� �\f��U�^����?T�ad+@�3	��Y�`���S��1Je͊�OQ̮��%� �y\Y
e�	��r���FG�/Չ[�'���|�oV+�q&�&E�w�\Vܤw�X�
���;�ep�\�����n]dw�$g	�56$�s2嘮;cO����G�����-��*��sz�s����Q�2]hp�eFKZ����M�d�?�Fv:ԟ�6:;�&�I0�;u������85e˸�UE2�)���،q�ϑ�����Ճ�9�
��C��!��ΠHf�Ijo����nb��P��*�.Qkz���;�b�%��s�ɹ�����L���		����RIW�g)�8<GS'�JB���T(�g�0��A����y����iZ!�~��V�_��*�]�X�q�������52e���v� ��	�&�{>9z� |ђF��f�����=H
����%^
?񴰜y2��^u:������4��J����_#�W=�>KLsj��Κ�$����[�zp�J��^��9r���|��NP���E]B;:)9->i#vHs��O�F���t�s���j$�CZZH�߾[<@ĩ��)���}�꒼��C9�鍕fS�Z$aKaQ��i�DDQ۫T�i����)�L`38���9*0;*S|�ހ�:���"���a���QWm:�	8�$!:�ȍ�`��.�ح��m}᫧n�H�L�|�� �V�sW[���M�K��yә[�8����֡}�4����`�����R �gi<%<Yx����[�{(��l�F��!G����F6��qU�;����{*j���jg)lT֟n�TrȌ@�oߚ��W52t���ljjϱ� <���i����ML���t�� ,   �FB3�g��S�N�奺��:���H���W�
G�      8   8   x�3�t��;�� ?'�X��4'31���<N�����NcC(23�4� !��=... �      :   �   x��A�@����S̢k:բ+�E%:�&4��>�6�SC��SH���Yi���a�{I�X���h4���8ú�4��n�u�ܶRᵶEx8w�(�	��a�qNv�����~��S`V�v��
�V��̰��w�M�*/QQ�/r TJ��?���-�N��wM�lZ��/��4�      <   �   x���K�0 ���9X>�Н���*�7$65����9�|�aױ!U��A9L�N��<��.U�⣹�ǰ-���%1#�*�ݶGϊ���D�q��T����y�v���Ts9!�PXd}�eKQ"l���(�yU)�-Ш��E���	Ȋ�!���/��I�      >     x���;�T��:Y0�v�[9�P"$*
������Zfc<.����u�_O�O�o����������~��6��n��1�Ƨ�ڴ�^ӨI��M�&w�����nr7�����fw�s�0^�E�6�:������������������Y]�E�6�:�ȏ�ȏ�ȏ�ȏ�ȏ�ȏ�ȏ��O��O�4^�E�6�:��O��O��O��O��O��O��O�������<^�E�6�:�����������������������/��/�2^�E�6�:��/��/��/��/��/��/��/�¯�ʯ�:^�E�6�:�ʯ�ʯ�ʯ�ʯ�ʯ�ʯ�ʯ��o��o�6^�E�6�:��o��o��o��o��o��o��o�������>^�E�6�:��������������������?��x}zjѪM����ܓ{rO��=�'��ܓ{r�y�O�n������뗿z|����o7b������i̝��������b����?�?|����~�����������������1      @   �   x���K
�0@��)z?���^�BW�h:�|P+���vQAZ���c�]���7��]�$h�h�~(��tԷX�.*k��bPC
1  ߡ��	7b����� Z<�=4S��քQF.�:��|�y
JJ�Q}�p�����:���:8�C72ws+#$B%BJ�1b�y��f ����ZJ�/     