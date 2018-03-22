<?php

use Illuminate\Database\Seeder;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialization')->delete();

        $specializations = $this->specialization();
        $descriptions = $this->description();

        for ($i=0;$i<count($specializations);$i++){
            //Create Specialization row
            factory(App\Specialization::class)->create([
                'name' => $specializations[$i],
                'desc' => $descriptions[$i],
            ]);//Created Specialization row
        }
    }

    private function specialization()
    {
        $specializations = ['Humanities',
            'Social Sciences',
            'Natural Sciences',
            'Formal Sciences',
            'Agriculture',
            'Architecture and Design',
            'Business',
            'Health Sciences',
            'Education',
            'Engineering',
            'Media and Communication',
            'Public Administration',
            'Transportation',
            'Nutrition',
            'Senior High School',
            'Primary School',];

        return $specializations;
    }

    private function description()
    {
        $descriptions = ['Humanities is a field of study that deals with the ways human think and feel and how they 
        express themselves.',
            'Social Sciences is a collective term for the branches of science that deal with the study of humans, 
            their nature, behavior, and how they interact with one another',
            'Natural Sciences is a collective term for the branches of science that deal with the study of nature and 
            the rules that apply to it. These include sciences that focus on things that can be observed.',
            'Formal Sciences is a collective term for the brances of science that deal with the study of theoretical 
            systems. Contrary to natural sciences that try to understand the nature of things through experiments and 
            observations, formal sciences are more concerned with defining the rules that govern a particular theory.',
            'the science or practice of farming, including cultivation of the soil for the growing of crops and the 
            rearing of animals to provide food, wool, and other products.',
            'The art or practice of designing and constructing buildings.',
            'Scientifically based study of economic and management sciences, "premised on the application of 
            quantitative methods". The practice of making one\'s living by engaging in commerce.',
            'Biomedical sciences are a set of applied sciences applying portions of natural science or formal science, 
            or both, to knowledge, interventions, or technology that are of use in healthcare or public health.',
            'Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, 
            beliefs, and habits. Educational methods include storytelling, discussion, teaching, training, and directed 
            research.',
            'Engineering is the creative application of science, mathematical methods, and empirical evidence to the 
            innovation, design, construction, and maintenance of structures, machines, materials, devices, systems, 
            processes, and organizations.',
            'It is either associated with communication media, or the specialized mass media communication businesses 
            such as print media and the press, photography, advertising, cinema, broadcasting (radio and television), 
            publishing and point of sale.',
            'Public administration is the implementation of government policy and also an academic discipline that 
            studies this implementation and prepares civil servants for working in the public service.',
            'Transport or transportation is the movement of humans, animals and goods from one location to another. 
            Modes of transport include air, land, water, cable, pipeline and space. The field can be divided into 
            infrastructure, vehicles and operations.',
            'Nutrition is the science that interprets the interaction of nutrients and other substances in food in 
            relation to maintenance, growth, reproduction, health and disease of an organism.',
            'a secondary school typically comprising the three highest grades.',
            'A primary school (or elementary school in American English and often in Canadian English) is a school 
            in which children receive primary or elementary education from the age of about five to twelve, coming after preschool and before secondary school.',];


        return $descriptions;
    }
}
