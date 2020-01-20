<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testBasicHome()
    {
        $this->get('/')->assertSee('Home');
        $this->get('/')->assertSee('Trailers');
        $this->get('/')->assertSee('Contacto');
        $this->get('/')->assertSee('Categorias');
        $this->get('/')->assertSee('Cartelera');
        $this->get('/')->assertSee('comentarios');
        $this->get('/')->assertSee('Crítica reciente');
    }

    public function testBasicTrailers()
    {
        $this->get('/trailers')->assertSee('trailers');
    }

    public function testBasicFooter()
    {
        $this->get('/contacto')->assertSee('Contacto');
        $this->get('/contacto')->assertSee('Nombre');
        $this->get('/contacto')->assertSee('Email');
    }

    public function testBasicAdmin()
    {
        $this->get('/categoria/1')->assertSee('Terror');
        $this->get('/categoria/2')->assertSee('Comedia');
        $this->get('/categoria/3')->assertSee('Acción');
        $this->get('/categoria/4')->assertSee('Drama');
        $this->get('/categoria/5')->assertSee('Animación');
    }

    public function testBasicFilm()
    {
        $this->get('/pelicula/1')->assertSee('Comments');
        $this->get('/pelicula/1')->assertSee('Información');
        $this->get('/pelicula/1')->assertSee('disponibilidad');
    }

}
