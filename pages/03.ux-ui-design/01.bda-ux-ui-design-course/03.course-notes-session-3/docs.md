---
title: Course Notes - Session 3
taxonomy:
  category:
    - docs
routes:
  canonical: /ux-ui-design/bda-ux-ui-design-course/course-notes-session-3
---
## Adaptive vs. Responsive

* Responsive is a single codebase that adapts to various screen sizes and devices
* Adaptive serves different content/code based on the various screen sizes and/or devices
* Nathan re-iterates that he doesn't think everything should be "mobile first" -- that you should always do the research and design for your user base: meet the user where they are.
* Nathan says he believes that native iOS/Android apps are being taken over by web apps that run in a mobile browser.
  * Evan thinks there are still use cases for creating native apps, as they can potentially tap into more of the phone's capabilities

#### From Class Slides

* Responsive solves issues for different screensizes by fitting ui into different design grids. (Fluid, adapts to the size of the screen)
* Adaptive solves issues for different screensizes by applying custom design states. (Static designs based on breakpoints)

Read more here: https://www.uxpin.com/studio/blog/responsive-vs-adaptive-design-whats-best-choice-designers/

### Common screen sizes

* 320px — global standard for mobile, because the rest of the world has Android phones
* 375px — iOS smallest size, good for American mobile
* 960px — common tablet size, smaller laptops or thinkpads and such (768px at the low size)
* Common desktop sizes
  * 1280px
  * 1440px
  * 1920px
* **SUPER HD** alright alright

### A note about images

* Images can crop in different ways based on size of screen
* Depending on the focal point of the image, it could be fine or suck
* Does an image overflow the `div` it's in to make sure it looks good in the viewport? i.e. making it `zoom crop` inside it's container
* Images with text in them: just don't do it. Ever. Except when you have to, and even then don't.

## User Personas

We did a review of a few user personas created by the class members. Needing more detailed demographics was a common piece of feedback. Anything that either confirms or clarifies an assumption a designer might have about a user are good e.g. a designer not in the know about marijuana users might think all pot users are inactive, but the user research might show that they are actually very active.

## Usability Testing

### Fundamentals of Usability Testing

* Test at all stages of the process: requirements, workflows, wireframes, etc.
* Test at the beginning, middle, and end of the process.
* You can expect to get 30% of your critical issues in 5 tests (needs to be verified)
  * Was there something about getting 70% of all issues in 7 test sessions?

### User-testing Wireframes

How specifically to test things, applying the above principals.

1. **App Description** i.e. what is the thing we are looking at? Needed so the tester understands what they are testing… This is a trip itinerary app, or this is a garage sale finder app.
1. **Write out (script) questions that elicit a specific response** e.g. Can you find where to add a user? What do you think you can do on this page? Since we're not testing prototypes (i.e. nothing is clickable) we need to prompt feedback about the features/functionality of each page or screen.
  * Start really broad ("What do you think you can do on this page") and then focus.
  * If you're ultimate goal is to sell them a pink shoe, you shouldn't start with "Can you buy a pink shoe on this page?"
1. **Document the feedback, always!** We need to record and document the user feedback, pain points, frustrations, zero states, wins, loses, improvements, observations

### Iterate, and test again

1. Improve your questions/script during and after initial user-test. It's maybe okay to go "off script" as you need to, in order to react to or adjust based on issues discovered about usability.
1. Edit/improve your documented research results
  * Identify better UI components?
  * Mobile or Desktop work needed?
  * Workflow Improvements? e.g. too many or too few steps? where are we in the process of the flow?
  * New (future) feature(s) identified? Maybe the user says "Why can't it just do X?"
  * Missing or unnecessary requirements!

### Processing Results

* 10% is a good rate to make changes by, meaning if 10% of your users (1/10) have trouble with something, it's worth changing/checking out/making it better.
* Did you have enough tests to qualify this as a legit result? Really 5-7 is enough. Totally enough to find/identify pain points and critical issues.
* Internal or external? Yes.
  * The quality of the testing will be related to the users doing the testing.
  * Test with actual users (or people that match your user personas) whenever possible.

### Usability Testing (Class Slides)

Usability testing is a technique used to evaluate a product by testing it on users

**Moderator:**

 - Inform the tester to be honest and be critical (Ask the user to talk out loud, talk-walk through process, I WANT TO HEAR YOUR THOUGHTS)
 - Observation is more important than leading
 - Identify areas that aren’t intuitive
 - Pay attention the tester’s micro expressions and mood
 - Document as they interact
 - Open ended mind-frame (Don’t tell a tester where to click)
 - Print out screens for note taking and in case there are internet issues

**Session:**
 - Document details about the user persona
 - Simply brief the tester on what they are looking at (This is an agent toolkit)
 - Complete script AND allow for documenting off-script discoveries
 - Time-box sessions
 - Follow-up questions (Was that easy or hard? 1-10)
 - Remain neutral but helpful in case of technical road-bumps
 - Run a test session before going live

#### Example user testing script:

1. Intro
   - I am Nathan from RE/MAX, I would like to show you some new tech today so we can learn about it.
   - This app is an Agent roster App
   - How is your day going?
   - I am going to ask you a series of questions, please be honest and provide critical feedback.
   - Please speak outloud as you interact
2. Test
   - Here is the homepage, what do you think you can do on this page?
   - How does this make you feel?
   - Can you find a RE/MAX agent from your office?
   - Can you send them a referral?
   - What else can you do?
   - Do you have the ability to contact the Agent you found?
   - Is there enough information about this agent for you to understand if they are a good choice?
3. Post test questions
   - On a scale of 1-10, 10 being great and 1 being terrible, how would you rate thus app?
   - Would you recommend this to a friend or co-worker
   - Is there anything that stood out that you would like of me to know?

## Hi Fidelity Mockups

* Take your wireframe, and create the pixel-perfect design including the finalized UI elements.
* Make sure the aesthetic fits the brand, tone, etc.
   * Rounded corners or not?
   * Bright colors or muted?
   * Big buttons or small?
   * What style of photography? Photo treatments?
* Design patterns: the user has been taught to expect certain things to look a certain way, or be located in a certain place. Don't disappoint them.
   * If you always put the CTA button in the bottom right, do that. Always.
   * Use the same icon consistently for certain functionality e.g. a bookmark icon for saving a favorite.
   * Colors should have meaning, and be used consistently.
* All good art and design comes through research and finding inspiration. Go search for cool shit and re-use it.

#### Wireframe example

![wireframe example](Wireframe-Example.png)

#### Hi-fidelity example

![wireframe example](High-Fidelity-Example.png)

## Creating Hifis 101 (Class Slides)

- What is a Hifi… High-Fidelity Design (Pixel perfect representation of the final design)
- Adding details to UI elements (Rounded, Shadows, Outline, Big, Small, Light, Dark, Exact Spacing, Ratios, Font Selection, Color Selection, Brand representation, Designing for User Types/Personas)
- Emotion design (What are we designing for? Discovery site? Beauty product? New car? Rock climbing classes? Medical Application? Yoga Networking? ALL have different designs styles)
- Design patterns; confirm and finalize (EX: All )
- FIND influence… Remember Picasso’s beginnings, he imitated other masters before he himself became one
   - No musician, artist, designer, creator, writer, chef, engineer, scientist, does this alone

### Prepping for Hifi Mockups

#### FontAwesome

* Add FontAwesome to your computer's font library to access easy as icons and stuff

#### Craft

* Prototyping would be great in Craft
* Sync to InVision

#### Images

Free stock image services that you can link up Sketch to:

* Unsplash.com
* Pexels.com

## Design Philosophy Stuff

### Muri, muda, mura

Design philosophy

* Muri == overburdened
* Mura == unevenness, fluctuation, variation
* Muda == waste

![muri mura muda](https://lh3.googleusercontent.com/srVhUngUnuXx_kKGYBe8MjYJrlWorGTatceJOryD4GRiVJMxFb9JO77mBIpV_N3Wzpk8rO94B-VVsciDFil1P0FQvQzDyROewiXj3kVh5Tr637TWLV4z8n_2BYv4_BupfrGhvjl2)

Challenge yourself to memorize this, or take it to heart, and apply this concept.

Try to identify each of these things in your designs in a "Creative QA" session i.e. Creative Review.

### Virginia Satir Change Model

As we move across time, we make decisions and do certain things. This model demonstrates that even though we expect our happiness to increase with positive change, that it actually doesn't. And that even with positive change (new job with more pay, marriage, etc.) there is an immediate stress that results in short-term lower happiness, but eventual long-term higher status-quo happiness once the challenges are overcome.

Basically, new is scary and change is scary.

In tech this has a correlation to adoption of new features being introduced into an app, etc. There will be a dip in use/adoption, but a long-term gain in usage and satisfaction.

https://stevenmsmith.com/ar-satir-change-model/

![Satir Change Model](http://www.stevenmsmith.com/images/satir_graph.png)

## Homework for next week

* Hi-fidelity mockups of our wireframes

