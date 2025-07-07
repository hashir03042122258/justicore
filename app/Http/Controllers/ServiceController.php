<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $services = [
            'legal-consultation' => [
                'title' => 'Legal Consultation',
                'description' => '
                    <h3>Overview</h3>
                    <p>Our legal consultation helps clients understand their rights and legal options.</p>
                    <h3>Initial Evaluation</h3>
                    <p>We conduct a detailed review of your case background...</p>
                    <h3>Legal Guidance</h3>
                    <p>You\'ll receive expert advice tailored to your situation...</p>
                    <h3>Next Steps</h3>
                    <p>We recommend actionable steps to resolve your matter...</p>
                ',
                'lawyer' => 'Usman Ahmed',
                'image' => 'usman.png',
                'charges' => 15000,
                'cases' => 120,
                'win_rate' => '92%',
            ],
            'civil-law' => [
                'title' => 'Civil Law',
                'description' => '
                    <h3>What is Civil Law?</h3>
                    <p>Civil law handles disputes between individuals or organizations where compensation may be awarded to the victim rather than criminal punishment.</p>

                    <h3>Types of Civil Cases We Handle</h3>
                    <p>We cover cases like breach of contract, property disputes, landlord-tenant issues, defamation, personal injury claims, and consumer complaints.</p>

                    <h3>Our Legal Strategy</h3>
                    <p>We begin with a thorough review of the case documents, followed by client consultation to determine the best legal course of action with minimal conflict.</p>

                    <h3>Negotiation & Settlement</h3>
                    <p>Most civil cases are settled before trial. Our team actively negotiates with the other party to reach a fair and speedy settlement without unnecessary litigation.</p>

                    <h3>Why Choose Us?</h3>
                    <p>With a proven track record and client-focused approach, we prioritize your peace of mind and deliver reliable representation at every stage of the case.</p>
                ',
                'lawyer' => 'Muzamil Hassan',
                'image' => 'muzamilhassan.png',
                'charges' => 20000,
                'cases' => 160,
                'win_rate' => '88%',
            ],
            'family-law' => [
                'title' => 'Family Law',
                'description' => '
                    <h3>Understanding Family Law</h3>
                    <p>Family law focuses on legal matters involving family relationships such as marriage, divorce, child custody, and guardianship.</p>

                    <h3>Divorce & Separation</h3>
                    <p>We guide you through complex emotional and legal processes, helping you reach fair settlements and protecting your rights during divorce.</p>

                    <h3>Child Custody & Support</h3>
                    <p>Our lawyers ensure your child\'s best interests are protected, and custody agreements reflect your family\'s needs with legal clarity.</p>

                    <h3>Domestic Violence Protection</h3>
                    <p>We assist victims in obtaining restraining orders and legal protection while maintaining safety and confidentiality throughout the process.</p>

                    <h3>Why Trust Our Family Lawyers?</h3>
                    <p>With a compassionate yet firm approach, our lawyers bring years of experience in resolving family disputes with dignity and fairness.</p>
                ',
                'lawyer' => 'Ali Raza',
                'image' => 'aliraza.jpeg',
                'charges' => 18000,
                'cases' => 140,
                'win_rate' => '90%',
            ],
            'criminal-defense' => [
                'title' => 'Criminal Defense',
                'description' => '
                    <h3>What is Criminal Defense?</h3>
                    <p>Criminal defense protects individuals accused of crimes, ensuring fair treatment and defending their rights in legal proceedings.</p>

                    <h3>Types of Criminal Cases</h3>
                    <p>We handle theft, assault, fraud, drug-related offenses, and other criminal charges with a strong and strategic defense approach.</p>

                    <h3>Investigation & Evidence Review</h3>
                    <p>Our team conducts deep case analysis, evidence review, and witness interviews to build a solid and persuasive defense strategy.</p>

                    <h3>Trial Representation</h3>
                    <p>With sharp courtroom skills, we represent you before judges and juries, challenging weak evidence and advocating for justice.</p>

                    <h3>Why Choose Our Defense Team?</h3>
                    <p>Our criminal defense lawyers have a high success rate and a strong reputation for protecting the rights of the accused under pressure.</p>
                ',
                'lawyer' => 'Sara Khan',
                'image' => 'sara.png',
                'charges' => 25000,
                'cases' => 190,
                'win_rate' => '87%',
            ],
            'property-disputes' => [
                'title' => 'Property Disputes',
                'description' => '
                    <h3>What are Property Disputes?</h3>
                    <p>These disputes involve ownership, tenancy, boundaries, or sale-related conflicts over land or buildings between individuals or companies.</p>

                    <h3>Types of Property Cases</h3>
                    <p>Our expertise includes disputed inheritances, tenant-landlord conflicts, land grabbing cases, illegal possession, and partition suits.</p>

                    <h3>Documentation & Verification</h3>
                    <p>We conduct in-depth title searches and verification of property documents to ensure that your ownership rights are fully protected.</p>

                    <h3>Court Representation</h3>
                    <p>When settlement fails, we represent you in civil courts with well-prepared arguments, accurate records, and strong evidence.</p>

                    <h3>Why Clients Choose Us</h3>
                    <p>Our reputation for honesty and deep understanding of property law helps clients resolve even the most difficult land disputes efficiently.</p>
                ',
                'lawyer' => 'Kamran Sheikh',
                'image' => 'kamran.jpeg',
                'charges' => 22000,
                'cases' => 170,
                'win_rate' => '89%',
            ],
            'contract-review' => [
                'title' => 'Contract Review',
                'description' => '
                    <h3>Why Contract Review Matters</h3>
                    <p>Every contract holds legal power. Reviewing them ensures you understand your rights and avoid potential liabilities before signing.</p>

                    <h3>Types of Contracts We Handle</h3>
                    <p>We review employment agreements, business deals, lease contracts, NDAs, service contracts, and all commercial/legal documents.</p>

                    <h3>Clause-by-Clause Analysis</h3>
                    <p>Our team dissects every clause, highlights red flags, suggests changes, and explains legal jargon in simple terms to clients.</p>

                    <h3>Contract Drafting & Modifications</h3>
                    <p>We not only review but also draft and edit contracts tailored to your goals and safeguard your interests in every deal.</p>

                    <h3>Trusted by Professionals</h3>
                    <p>With business clients and individuals relying on our expertise, we ensure every document is clear, fair, and legally binding.</p>
                ',
                'lawyer' => 'Tahir Mehmood',
                'image' => 'tahir.png',
                'charges' => 16000,
                'cases' => 110,
                'win_rate' => '91%',
            ],
        ];

        if (!isset($services[$slug])) {
            abort(404);
        }

        $service = (object) $services[$slug];
        return view('service-detail', compact('service'));
    }
}
