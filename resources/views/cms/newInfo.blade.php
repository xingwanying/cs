
@extends('layouts.main')

@section('content')
    <article id="main">
        <header>
            <h2>Elements</h2>
            <p>Aliquam ut ex ut interdum donec amet imperdiet eleifend</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h4>图文编辑</h4>
                    <form method="post" action="#">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="demo-name" id="demo-name" value="" placeholder="Name">
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email">
                            </div>
                            <div class="12u$">
                                <div class="select-wrapper">
                                    <select name="demo-category" id="demo-category">
                                        <option value="">- Category -</option>
                                        <option value="1">Manufacturing</option>
                                        <option value="1">Shipping</option>
                                        <option value="1">Administration</option>
                                        <option value="1">Human Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="4u 12u$(small)">
                                <input type="radio" id="demo-priority-low" name="demo-priority" checked="">
                                <label for="demo-priority-low">Low</label>
                            </div>
                            <div class="4u 12u$(small)">
                                <input type="radio" id="demo-priority-normal" name="demo-priority">
                                <label for="demo-priority-normal">Normal</label>
                            </div>
                            <div class="4u$ 12u$(small)">
                                <input type="radio" id="demo-priority-high" name="demo-priority">
                                <label for="demo-priority-high">High</label>
                            </div>
                            <div class="6u 12u$(small)">
                                <input type="checkbox" id="demo-copy" name="demo-copy">
                                <label for="demo-copy">Email me a copy</label>
                            </div>
                            <div class="6u$ 12u$(small)">
                                <input type="checkbox" id="demo-human" name="demo-human" checked="">
                                <label for="demo-human">Not a robot</label>
                            </div>
                            <div class="12u$">
                                <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Send Message" class="special"></li>
                                    <li><input type="reset" value="Reset"></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection